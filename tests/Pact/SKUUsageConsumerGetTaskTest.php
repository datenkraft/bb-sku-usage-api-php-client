<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerGetTaskTest
 * @package Pact
 */
class SKUUsageConsumerGetTaskTest extends SKUUsageConsumerTest
{

    /** @var string */
    protected $taskId;
    /** @var string */
    protected $taskIdValid;
    /** @var string */
    protected $taskIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_BB_SKU_USAGE_TASK_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->taskIdValid = 'taskId_test_get';
        $this->taskIdInvalid = 'taskId_test_invalid';
        $this->taskId = $this->taskIdValid;

        $taskStatus = 'finished';
        $transactions = [
            [
                'transactionId' => 'transactionId_test_get1',
                'transactionStatus' => 'success',
                'transactionSeen'=> true,
            ],
            [
                'transactionId' => 'transactionId_test_get2',
                'transactionStatus' => 'failure',
                'transactionSeen'=> false,
            ]
        ];
        $entryCount = 10;

        $this->requestData = [];
        $this->responseData = [
            [
                'taskId' => $this->taskId,
                'taskStatus' => $taskStatus,
                'entryCount' => $entryCount,
            ]
        ];

        $this->path = '/task/' . $this->taskId;
    }

    public function testGetTaskSuccess()
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A task with taskId exists')
            ->uponReceiving('Successful GET request to /task/{taskId}');

        $this->beginTest();
    }

    public function testGetTaskUnauthorized()
    {
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetTaskForbidden()
    {
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetTaskNotFound(): void
    {
        // Path with taskId for non existent task
        $this->taskId = $this->taskIdInvalid;
        $this->path = '/task/' . $this->taskId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A task with taskId does not exist'
            )
            ->uponReceiving('Not Found GET request to /task/{taskId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @return ResponseInterface
     * @throws AuthException
     * @throws ConfigException
     */
    protected function doClientRequest(): ResponseInterface
    {
        $factory = new ClientFactory(
            ['clientId' => 'test', 'clientSecret' => 'test', 'oAuthTokenUrl' => 'test', 'oAuthScopes' => ['test']]
        );
        $factory->setToken($this->token);
        $client = Client::createWithFactory($factory, $this->config->getBaseUri());

        return $client->getTask($this->taskId, Client::FETCH_RESPONSE);
    }
}
