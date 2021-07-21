<?php

namespace Pact;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage;
use DateTime;
use DateInterval;
use DateTimeInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerPostSKUUsageTest
 * @package Pact
 */
class SKUUsageConsumerPostSKUUsageTest extends SKUUsageConsumerTest
{

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->requestData = [
            [
                'skuCode' => $this->skuCode,
                'quantity' => 1,
                'projectId' => $this->projectId,
                'usageStart' => (new DateTime('2021-01-28'))->format(DateTimeInterface::ATOM),
                'usageEnd' => (new DateTime('2021-01-28'))
                    ->add(new DateInterval('P1D'))->format(DateTimeInterface::ATOM),
                'externalId' => $this->externalId,
                'meta' => [
                    'meta1' => 0,
                    'meta2' => 9.99,
                    'meta3' => 'test',
                    'meta4' => [
                        'test' => 'test'
                    ]
                ]
            ]
        ];

        $this->responseData = [
            [
                'skuUsageId' => $this->matcher->uuid(),
                'skuCode' => $this->skuCode,
                'quantity' => 1,
                'usageStart' => (new DateTime('2021-01-28'))->format(DateTimeInterface::ATOM),
                'usageEnd' => (new DateTime('2021-01-28'))->add(new DateInterval('P1D'))
                    ->format(DateTimeInterface::ATOM),
                'projectId' => $this->projectId,
                'externalId' => $this->externalId,
                'meta' => [
                    'meta1' => 0,
                    'meta2' => 9.99,
                    'meta3' => 'test',
                    'meta4' => [
                        'test' => 'test'
                    ]
                ]
            ]
        ];

        $this->path = '/sku-usage';
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testPostSKUUsageSuccess()
    {
        $this->expectedStatusCode = '201';

        // Build and register the interaction
        $this->builder
            ->given(
                'A SKU with skuCode exists, the combination of projectId and externalId is unique, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful POST request to /sku-usage');

        $this->beginTest();
    }

    public function testPostSKUUsageUnauthorized()
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401, extra is not defined
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostSKUUsageForbidden()
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_GET');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403, extra is not defined
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A SKU with skuCode exists, the request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostSKUUsageBadRequest()
    {
        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        // SkuCode is empty
        $this->requestData[0]['skuCode'] = '';

        // New Combination of projectId and externalId that does not exist yet
        $this->requestData[0]['projectId'] = $this->matcher->uuid()['data']['generate'];
        $this->requestData[0]['externalId'] = 'externalId_2';

        $this->builder
            ->given('The skuCode in the request is empty')
            ->uponReceiving('Bad POST request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostSKUUsageUnprocessableEntity()
    {
        // SKU with skuCode does not exist
        $this->requestData[0]['skuCode'] = 'skuCode_test_invalid';

        // New Combination of projectId and externalId that does not exist yet
        $this->requestData[0]['projectId'] = $this->matcher->uuid()['data']['generate'];
        $this->requestData[0]['externalId'] = 'externalId_3';

        // Error code in response is 422
        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'externalId' => $this->requestData[0]['externalId']
        ];

        $this->builder
            ->given('The SKU with skuCode does not exist')
            ->uponReceiving('Unprocessable Entity POST request to /sku-usage with non-existent skuCode');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostSKUUsageConflict()
    {
        // Combination of projectId and externalId already exists
        $this->requestData[0]['projectId'] = $this->projectIdDuplicate;
        $this->requestData[0]['externalId'] = $this->externalIdDuplicate;

        // Error code in response is 409
        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'externalId' => $this->requestData[0]['externalId']
        ];

        $this->builder
            ->given('The combination of projectId and externalId already exists')
            ->uponReceiving(
                'Conflict POST request to /sku-usage with already existent combination of projectId and  ' .
                'externalId'
            );

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostSKUUsageMultipleErrors()
    {
        // SkuCode is empty
        $this->requestData[0]['skuCode'] = '';

        // Combination of projectId and externalId already exists
        $this->requestData[0]['projectId'] = $this->projectIdDuplicate;
        $this->requestData[0]['externalId'] = $this->externalIdDuplicate;

        // Status code of the response is 400
        $this->expectedStatusCode = '400';

        // Error code of first error is 400
        $this->errorResponse['errors'][0] = [
            'code' => '400',
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'externalId' => $this->requestData[0]['externalId']
            ]
        ];

        // Error code of second error is 409
        $this->errorResponse['errors'][1] = [
            'code' => '409',
            'message' => $this->matcher->like('Example error message'),
            'extra' => [
                'externalId' => $this->requestData[0]['externalId']
            ]
        ];

        $this->builder
            ->given('No skuCode is provided in the request, the combination of projectId and externalId already exists')
            ->uponReceiving(
                'Multiple Errors POST request to /sku-usage without a skuCode and an already existent combination of ' .
                'projectId and externalId'
            );

        $this->responseData = $this->errorResponse;
        $this->beginTest();
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
        $client = Client::createWithFactory($factory, $this->config->getBaseUri());

        $skuUsages = [];
        foreach ($this->requestData as $requestData) {
            $skuUsages[] = (new NewSkuUsage())
                ->setSkuCode($requestData['skuCode'])
                ->setProjectId($requestData['projectId'])
                ->setExternalId($requestData['externalId'])
                ->setQuantity($requestData['quantity'])
                ->setUsageStart(new DateTime($requestData['usageStart']))
                ->setUsageEnd(new DateTime($requestData['usageEnd']))
                ->setMeta($requestData['meta']);
        }

        return $client->postSkuUsage($skuUsages, Client::FETCH_RESPONSE);
    }
}
