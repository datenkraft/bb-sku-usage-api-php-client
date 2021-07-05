<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchTransaction;
use Exception;
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

    /** @var string */
    protected $taskId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'PATCH';

        $this->token = getenv('VALID_TOKEN_BB_SKU_USAGE_TRANSACTION_PATCH');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->transactionIdValid = 'transactionId_test2_patch';
        $this->transactionIdInvalid = 'transactionId_test_invalid';
        $this->transactionId = $this->transactionIdValid;

        $this->taskId = $this->taskIdPatch;

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

    public function testPatchTaskSuccess(): void
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
            ->uponReceiving('Unauthorized PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTaskForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
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

    public function testPatchTaskNotFound(): void
    {
        // Path with transactionId for non existent Transaction
        $this->transactionId = $this->transactionIdInvalid;
        $this->path = '/task/' . $this->taskId . '/transaction/' . $this->transactionId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A Task with taskId does not exist'
            )
            ->uponReceiving('Not Found PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPatchTaskBadRequest(): void
    {
        $this->markTestSkipped('Cannot be tested because empty string transactionSeen = false ' .
        '(Client throws Exception if transactionSeen is not set/null)');

        /*
        // transactionSeen is not defined
        $this->requestData['transactionSeen'] = "";

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PATCH request to /task/{taskId}/transaction/{transactionId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
        */
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
