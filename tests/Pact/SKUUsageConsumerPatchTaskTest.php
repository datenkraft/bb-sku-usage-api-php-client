<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateTask;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerPatchTransactionTest
 * @package Pact
 */
class SKUUsageConsumerPatchTaskTest extends SKUUsageConsumerTest
{
    /** @var string */
    protected $taskId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'PATCH';

        $this->token = getenv('CONTRACT_TEST_CLIENT_TOKEN');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->taskId = $this->taskIdPatch;

        $this->requestData = [
            'taskStatus' => 'building',
        ];
        $this->responseData = [
            'taskId' => $this->taskId,
            'taskStatus' => 'building',
        ];

        $this->path = '/task/' . $this->taskId;
    }

    public function testPatchTaskSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'A task with taskId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful PATCH request to /task/{taskId}');

        $this->beginTest();
    }

    public function testPatchTaskUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PATCH request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTaskForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden PATCH request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTaskNotFound(): void
    {
        // Path with taskId for non existent Task
        $this->taskId = $this->taskIdNotFound;
        $this->path = '/task/' . $this->taskId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Task with taskId does not exist')
            ->uponReceiving('Not Found PATCH request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTaskWithRouteBadRequest(): void
    {
        // Path with invalid taskId
        $this->taskId = 'taskId_test_invalid';
        $this->path = '/task/' . $this->taskId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The taskId format is invalid')
            ->uponReceiving('Bad Request PATCH request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTaskUnprocessableEntity(): void
    {
        // taskStatus is unknown
        $this->requestData['taskStatus'] = "invalid";

        // Error code in response is 422
        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is contains a field with invalid content')
            ->uponReceiving('Unprocessable Entity PATCH request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @return ResponseInterface
     * @throws ConfigException
     * @throws AuthException
     */
    protected function doClientRequest(): ResponseInterface
    {
        $factory = new ClientFactory(
            ['clientId' => 'test', 'clientSecret' => 'test', 'oAuthTokenUrl' => 'test', 'oAuthScopes' => ['test']]
        );
        $factory->setToken($this->token);
        $client = Client::createWithFactory($factory, $this->config->getBaseUri());

        $task = (new UpdateTask());
        if (isset($this->requestData['taskStatus'])) {
            $task->setTaskStatus($this->requestData['taskStatus']);
        }

        return $client->patchTask($this->taskId, $task, Client::FETCH_RESPONSE);
    }
}
