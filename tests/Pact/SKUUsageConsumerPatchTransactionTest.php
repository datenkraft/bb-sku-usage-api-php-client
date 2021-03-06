<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchTransaction;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerPatchTransactionTest
 * @package Pact
 */
class SKUUsageConsumerPatchTransactionTest extends SKUUsageConsumerTest
{
    /** @var string */
    protected $transactionId;
    protected $transactionIdValid;
    protected $transactionIdInvalid;
    protected $transactionIdNotFound;

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

        $this->transactionIdValid = substr($this->taskId, 0, -1) . '2';
        $this->transactionIdInvalid = 'transactionId_test_invalid';
        $this->transactionIdNotFound = '00000000-0000-0000-0000-000000000000';
        $this->transactionId = $this->transactionIdValid;

        $this->requestData = [
            'transactionSeen' => true,
        ];
        $this->responseData = [
            'transactionId' => $this->transactionId,
            'transactionStatus' => 'failure',
            'transactionSeen' => true,
        ];

        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;
    }

    public function testPatchTransactionSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'A Transaction with transactionId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->beginTest();
    }

    public function testPatchTransactionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTransactionForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTransactionNotFound(): void
    {
        // Path with transactionId for non existent Transaction
        $this->transactionId = $this->transactionIdNotFound;
        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A Task with taskId does not exist')
            ->uponReceiving('Not Found PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTransactionWithRouteBadRequest(): void
    {
        // Path with invalid taskId and transactionId
        $this->taskId = 'taskId_test_invalid';
        $this->transactionId = $this->transactionIdInvalid;
        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][1]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The taskId and transactionId format is invalid')
            ->uponReceiving('Bad Request PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws GuzzleException
     */
    public function testPatchTransactionBadRequest(): void
    {
        // transactionSeen is not defined
        $this->requestData['transactionSeen'] = "";

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;

        // use guzzle because our client throws an exception if you set 'transactionSeen' to a non boolean value
        $this->prepareTest();

        $options = [
            'headers' => $this->requestHeaders,
            'http_errors' => false,
            'body' => json_encode($this->requestData),
        ];
        $response = $this->guzzleClient->patch($this->path, $options);

        $this->assertEquals($this->expectedStatusCode, $response->getStatusCode());
        $this->assertJson($response->getBody());
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

        $transaction = (new PatchTransaction());
        if (isset($this->requestData['transactionSeen'])) {
            $transaction->setTransactionSeen($this->requestData['transactionSeen']);
        }

        return $client->patchTransaction($this->taskId, $this->transactionId, $transaction, Client::FETCH_RESPONSE);
    }
}
