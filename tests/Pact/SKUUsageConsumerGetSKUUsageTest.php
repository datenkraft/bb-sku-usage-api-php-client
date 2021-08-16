<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use DateTime;
use DateTimeInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerGetSKUUsageTest
 * @package Pact
 */
class SKUUsageConsumerGetSKUUsageTest extends SKUUsageConsumerTest
{
    /** @var string */
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
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->externalId = $this->externalIdDuplicate;
        $this->queryParams = [
            'filter[projectId]' => 'b1fedb36-c774-11eb-b8bc-0242ac130003',
            'filter[externalId]' => $this->externalIdDuplicate,
        ];

        $this->requestData = [];
        $this->responseData = [
            [
                'skuUsageId' => $this->matcher->like('skuusage_id_test'),
                'skuCode' => $this->matcher->like($this->skuCode),
                'quantity' => $this->matcher->like(1),
                'usageStart' => $this->matcher->like((new DateTime())->format(DateTimeInterface::ATOM)),
                'usageEnd' => $this->matcher->like((new DateTime())->format(DateTimeInterface::ATOM)),
                'projectId' => 'b1fedb36-c774-11eb-b8bc-0242ac130003',
                'externalId' => $this->externalIdDuplicate,
            ]
        ];

        $this->path = '/sku-usage';
    }

    public function testGetSKUUsageSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('A SKU Usage exists for the given combination of projectId and externalId')
            ->uponReceiving('Successful GET request to /sku-usage');

        $this->beginTest();
    }

    public function testGetSKUUsageUnauthorized(): void
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

    public function testGetSKUUsageForbidden(): void
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

    public function testGetSKUUsageBadRequest(): void
    {
        $this->queryParams = [
            'filter[projectId]' => 'invalid_uuid',
            'filter[externalId]' => $this->externalIdDuplicate,
        ];

        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body or query is invalid')
            ->uponReceiving('Bad GET request to /sku-usage');

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

        return $client->getSkuUsage($this->queryParams, Client::FETCH_RESPONSE);
    }
}
