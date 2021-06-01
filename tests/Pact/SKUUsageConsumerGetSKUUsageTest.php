<?php

namespace Pact;

use DateTime;
use DateTimeInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerGetSKUUsageTest
 * @package Pact
 */
class SKUUsageConsumerGetSKUUsageTest extends SKUUsageConsumerTest
{

    protected $projectId;
    protected $externalId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_SKU_USAGE_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->path = '/sku-usage';

        $this->projectId = 'projectId_test';
        $this->externalId = 'externalId_test';
        $this->query = sprintf('filter[projectId]=%s&filter[externalId]=%s', $this->projectId, $this->externalId);

        $this->requestData = [];
        $this->responseData = [
            [
                'skuUsageId' => $this->matcher->like('skuUsageId_test'),
                'skuId' => $this->matcher->like('skuId_test'),
                'quantity' => $this->matcher->like(1),
                'usageStart' => $this->matcher->like((new DateTime())->format(DateTimeInterface::ATOM)),
                'usageEnd' => $this->matcher->like((new DateTime())->format(DateTimeInterface::ATOM)),
                'projectId' => 'projectId_test',
                'externalId' => 'externalId_test',
                'meta' => [
                    'amount' => $this->matcher->like(10000),
                    'currency' => $this->matcher->like('EUR'),
                    'description' => $this->matcher->like('Test description'),
                ]
            ]
        ];
    }

    public function testGetSKUUsageSuccess()
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A SKU Usage exists for the given combination of projectId and externalId')
            ->uponReceiving('Successful GET request to /sku-usage');

        $this->beginTest();
    }

    public function testGetSKUUsageUnauthorized()
    {
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetSKUUsageForbidden()
    {
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetSKUUsageBadRequest()
    {
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->query = '';

        $this->builder
            ->given('The query is invalid')
            ->uponReceiving('Bad GET request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function doClientRequest(): ResponseInterface
    {
        $client = new Client(['base_uri' => $this->config->getBaseUri()]);
        $options = [
            'headers' => $this->requestHeaders,
            'query' => $this->query,
            'http_errors' => false,
        ];
        return $client->get($this->path, $options);
    }
}
