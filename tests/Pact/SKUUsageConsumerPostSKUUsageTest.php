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

        $this->path = '/sku-usage';

        $this->requestData = [
            [
                'skuId' => 'skuId_test',
                'quantity' => 1,
                'projectId' => 'projectId_test',
                'usageStart' => (new DateTime('2021-01-28'))->format(DateTimeInterface::ATOM),
                'usageEnd' => (new DateTime('2021-01-28'))
                    ->add(new DateInterval('P1D'))->format(DateTimeInterface::ATOM),
                'externalId' => 'externalId_test',
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
                'skuUsageId' => $this->matcher->like(57),
                'skuId' => 'skuId_test',
                'quantity' => 1,
                'usageStart' => (new DateTime('2021-01-28'))->format(DateTimeInterface::ATOM),
                'usageEnd' => (new DateTime('2021-01-28'))->add(new DateInterval('P1D'))
                    ->format(DateTimeInterface::ATOM),
                'projectId' => 'projectId_test',
                'externalId' => 'externalId_test',
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
                'A SKU with skuId exists, the combination of projectId and externalId is unique, ' .
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
            ->given('A SKU with skuId exists, the request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostSKUUsageBadRequest()
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
        $this->beginTest();
    }

    public function testPostSKUUsageUnprocessableEntity()
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
        $this->beginTest();
    }

    public function testPostSKUUsageConflict()
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
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostSKUUsageMultipleErrors()
    {
        // SkuId is empty
        $this->requestData[0]['skuId'] = '';

        // Combination of projectId and externalId already exists
        $this->requestData[0]['projectId'] = 'projectId_test_duplicate';
        $this->requestData[0]['externalId'] = 'externalId_test_duplicate';

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
            ->given('No skuId is provided in the request, the combination of projectId and externalId already exists')
            ->uponReceiving(
                'POST request to /sku-usage without a skuId and an already existent combination of projectId ' .
                'and externalId'
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

        $skuUsage = (new NewSkuUsage())
            ->setSkuId($this->requestData[0]['skuId'])
            ->setProjectId($this->requestData[0]['projectId'])
            ->setExternalId($this->requestData[0]['externalId'])
            ->setQuantity($this->requestData[0]['quantity'])
            ->setUsageStart(new DateTime($this->requestData[0]['usageStart']))
            ->setUsageEnd(new DateTime($this->requestData[0]['usageEnd']))
            ->setMeta($this->requestData[0]['meta']);

        return $client->postSkuUsage([$skuUsage], Client::FETCH_RESPONSE);
    }
}
