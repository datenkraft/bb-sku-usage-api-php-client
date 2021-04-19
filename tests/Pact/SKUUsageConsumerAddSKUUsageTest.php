<?php

namespace Pact;

use DateTime;
use DateInterval;
use DateTimeInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SKUUsageConsumerAddSKUUsageTest
 * @package Pact
 */
class SKUUsageConsumerAddSKUUsageTest extends SKUUsageConsumerTest
{

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->requestData = [
            'skuId' => 'skuId_test',
            'quantity' => 1,
            'projectId' => 'projectId_test',
            'usageStart' => (new DateTime())->format(DateTimeInterface::ATOM),
            'usageEnd' => (new DateTime())->add(new DateInterval('P1D'))->format(DateTimeInterface::ATOM),
            'externalId' => 'externalId_test',
            'meta' => [
                'amount' => 10000,
                'currency' => 'EUR',
                'description' => 'Test description'
            ]
        ];

        $this->responseData = array_merge(
            [
                'skuUsageId' => 1,
            ],
            $this->requestData
        );

        $this->path = '/sku-usage';
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataSuccess()
    {
        $this->expectedStatusCode = '201';

        // Build and register the interaction
        $this->builder
            ->given(
                'A SKU with skuId exists, the combination of projectId and externalId is unique, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful POST request to /sku-usage');

        $this->testSuccessResponse();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataUnauthorized()
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401, extra is not defined
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        unset($this->errorResponse['errors'][0]['extra']);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /sku-usage');

        $this->testErrorResponse();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataForbidden()
    {
        // Token with invalid scope
        $this->token = 'valid_token_invalid_scope';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403, extra is not defined
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        unset($this->errorResponse['errors'][0]['extra']);

        $this->builder
            ->given('A SKU with skuId exists, the request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /sku-usage');

        $this->testErrorResponse();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataBadRequest()
    {
        // Error code in response is 400, extra is not defined
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        unset($this->errorResponse['errors'][0]['extra']);

        $this->requestData = ['Bad Request'];

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /sku-usage');

        $this->testErrorResponse();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataUnprocessableEntity()
    {
        // SKU with skuId does not exist
        $this->requestData['skuId'] = 'skuId_test_invalid';

        // Error code in response is 422
        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'externalId' => $this->requestData['externalId']
        ];

        $this->builder
            ->given('The SKU with skuId does not exist')
            ->uponReceiving('POST request to /sku-usage with non-existent skuId');

        $this->testErrorResponse();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataConflict()
    {
        // Combination of projectId and externalId already exists
        $this->requestData['projectId'] = 'projectId_test_duplicate';
        $this->requestData['externalId'] = 'projectId_test_duplicate';

        // Error code in response is 409
        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'externalId' => $this->requestData['externalId']
        ];

        $this->builder
            ->given('The combination of projectId and externalId already exists')
            ->uponReceiving('POST request to /sku-usage with already existent combination of projectId and externalId');

        $this->testErrorResponse();
    }
}
