<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerGetTransactionTest
 * @package Pact
 */
class SKUUsageConsumerGetTransactionTest extends SKUUsageConsumerTest
{

    /** @var string */
    protected $taskId;
    /** @var string */
    protected $transactionId;
    /** @var string */
    protected $transactionIdValid;
    /** @var string */
    protected $transactionIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_BB_SKU_USAGE_TRANSACTION_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json',
        ];

        $this->taskId = $this->taskIdGet;

        $this->transactionIdValid = substr($this->taskId, 0, -1) . '1';
        $this->transactionIdInvalid = 'transactionId_test_invalid';
        $this->transactionId = $this->transactionIdValid;

        $this->requestData = [];
        $this->responseData = [
            'transactionId' => $this->transactionId,
            'transactionStatus' => 'success',
            'transactionSeen' => true,
            'transactionResourceType' => 'transactionResourceType_test',
            'entryCount' => 1,
            'requestData' => [
                'body' => ['test' => 'test'],
            ],
            'responseData' => null,
        ];

        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;
    }

    public function testGetTransactionWithQuerySuccess(): void
    {
        // Set response fields and expected response
        $this->queryParams['fields'] = 'transactionId,transactionStatus,transactionSeen';
        $this->responseData = [
            'transactionId' => $this->transactionId,
            'transactionStatus' => 'success',
            'transactionSeen' => true,
        ];

        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A transaction with transactionId exists')
            ->uponReceiving(
                'Successful GET request to /task/{taskId}/transaction/{transactionId} with response fields set'
            );

        $this->beginTest();
    }

    public function testGetTransactionWithQueryBadRequest(): void
    {
        // Response field does not exist
        $this->queryParams['fields'] = 'invalidField';

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The specified response field does not exist')
            ->uponReceiving('Bad GET request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetTransactionWithRouteBadRequest(): void
    {
        // Path with invalid transactionId
        $this->transactionId = $this->transactionIdInvalid;
        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'The transactionId format is invalid'
            )
            ->uponReceiving('Bad Request GET request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetTransactionSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A transaction with transactionId exists')
            ->uponReceiving('Successful GET request to /task/{taskId}/transaction/{transactionId}');

        $this->beginTest();
    }

    public function testGetTransactionUnauthorized(): void
    {
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetTransactionForbidden(): void
    {
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetTransactionNotFound(): void
    {
        // Path with transactionId for non existent transaction
        $this->transactionId = '00000000-0000-0000-0000-000000000000';
        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A transaction with transactionId does not exist'
            )
            ->uponReceiving('Not Found GET request to /task/{taskId}/transaction/{transactionId}');

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

        return $client->getTransaction($this->taskId, $this->transactionId, $this->queryParams, Client::FETCH_RESPONSE);
    }
}
