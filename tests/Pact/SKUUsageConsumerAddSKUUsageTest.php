<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsageBase;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsageMeta;
use DateTime;
use DateInterval;
use DateTimeInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;

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
            [
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
            ]
        ];

        $this->responseData = [
            array_merge(
                [
                    'skuUsageId' => $this->matcher->like(1),
                ],
                $this->requestData[0]
            )
        ];

        $this->path = '/sku-usage';
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

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

        $this->testResponse();
    }

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

        $this->responseData = $this->errorResponse;
        $this->testResponse();
    }

    public function testAddSKUUsageDataForbidden()
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_READ');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403, extra is not defined
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        unset($this->errorResponse['errors'][0]['extra']);

        $this->builder
            ->given('A SKU with skuId exists, the request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->testResponse();
    }

    public function testAddSKUUsageDataBadRequest()
    {
        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        // SkuId is empty
        $this->requestData[0]['skuId'] = '';

        // New Combination of projectId and externalId that does not exist yet
        $this->requestData[0]['projectId'] = 'projectId_2';
        $this->requestData[0]['externalId'] = 'externalId_2';

        $this->builder
            ->given('The skuId in the request is empty')
            ->uponReceiving('Bad POST request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->testResponse();
    }

    public function testAddSKUUsageDataUnprocessableEntity()
    {
        // SKU with skuId does not exist
        $this->requestData[0]['skuId'] = 'skuId_test_invalid';

        // New Combination of projectId and externalId that does not exist yet
        $this->requestData[0]['projectId'] = 'projectId_3';
        $this->requestData[0]['externalId'] = 'externalId_3';

        // Error code in response is 422
        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'externalId' => $this->requestData[0]['externalId']
        ];

        $this->builder
            ->given('The SKU with skuId does not exist')
            ->uponReceiving('POST request to /sku-usage with non-existent skuId');

        $this->responseData = $this->errorResponse;
        $this->testResponse();
    }

    public function testAddSKUUsageDataConflict()
    {
        // Combination of projectId and externalId already exists
        $this->requestData[0]['projectId'] = 'projectId_test_duplicate';
        $this->requestData[0]['externalId'] = 'externalId_test_duplicate';

        // Error code in response is 409
        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'externalId' => $this->requestData[0]['externalId']
        ];

        $this->builder
            ->given('The combination of projectId and externalId already exists')
            ->uponReceiving('POST request to /sku-usage with already existent combination of projectId and externalId');

        $this->responseData = $this->errorResponse;
        $this->testResponse();
    }

    /**
     * @throws ConfigException
     * @throws Exception
     */
    protected function doClientRequest(): ResponseInterface
    {
        $factory = new ClientFactory(
            ['clientId' => 'test', 'clientSecret' => 'test', 'oAuthTokenUrl' => 'test', 'oAuthScopes' => ['test']]
        );
        $factory->setToken($this->token);

        $client = $factory->createClient(Client::class, $this->config->getBaseUri());

        $skuUsage = (new SkuUsageBase())
            ->setSkuId($this->requestData[0]['skuId'])
            ->setProjectId($this->requestData[0]['projectId'])
            ->setExternalId($this->requestData[0]['externalId'])
            ->setQuantity($this->requestData[0]['quantity'])
            ->setUsageStart(new DateTime($this->requestData[0]['usageStart']))
            ->setUsageEnd(new DateTime($this->requestData[0]['usageEnd']))
            ->setMeta(
                (new SkuUsageMeta())
                    ->setAmount($this->requestData[0]['meta']['amount'])
                    ->setCurrency($this->requestData[0]['meta']['currency'])
                    ->setDescription($this->requestData[0]['meta']['description'])
            );

        return $client->addSkuUsage([$skuUsage], Client::FETCH_RESPONSE);
    }
}
