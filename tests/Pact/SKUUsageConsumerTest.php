<?php

namespace Pact;

use DateTime;
use DateInterval;
use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PHPUnit\Framework\TestCase;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use GuzzleHttp\Client;

/**
 * Class SKUUsageConsumerTest
 */
class SKUUsageConsumerTest extends TestCase
{

    protected InteractionBuilder $builder;
    protected MockServerEnvConfig $config;
    protected array $skuUsageData;
    protected string $token;
    protected array $errorResponse;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Initialize the config of the mock server from environment variables
        $this->config = new MockServerEnvConfig();

        // Try to open a connection to the mock server to verify that it was started with the PactTestListener
        try {
            fsockopen($this->config->getHost(), $this->config->getPort());
        } catch (Exception $exception) {
            throw new Exception(
                'Mock server not running. Make sure the Testsuite was started with the PactTestListener.'
            );
        }

        // Create the interaction builder
        $this->builder = new InteractionBuilder($this->config);

        // Example SKU Usage data for testing
        $this->skuUsageData = [
            'skuId' => 'skuId_test',
            'quantity' => 1,
            'projectId' => 'projectId_test',
            'usageStart' => (new DateTime())->format(DateTime::ATOM),
            'usageEnd' => (new DateTime())->add(new DateInterval('P1D'))->format(DateTime::ATOM),
            'externalId' => 'externalId_test',
            'meta' => [
                'amount' => 10000,
                'currency' => 'EUR',
                'description' => 'Test description'
            ]
        ];

        // Example error response for testing
        $this->errorResponse = [
            'code' => '0',
            'message' => 'Example error message',
            'extra' => [
                'externalId' => $this->skuUsageData['externalId']
            ],
        ];

        // Authorization token for the request header
        // To be replaced by an actually valid token later to successfully verify the contract with the provider
        $this->token = 'valid_token';
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Verify that all registered interactions actually took place
        $this->builder->verify();
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataSuccess()
    {
        // Consumer request
        $request = new ConsumerRequest();
        $request
            ->setMethod('POST')
            ->setPath('/sku-usage')
            ->addHeader('Authorization', 'Bearer ' . $this->token)
            ->addHeader('Content-Type', 'application/json')
            ->setBody($this->skuUsageData);

        // Provider response (mocked)
        $response = new ProviderResponse();
        $response
            ->setStatus(201)
            ->addHeader('Content-Type', 'application/json')
            ->setBody(
                array_merge(
                    [
                        'skuUsageId' => 1,
                    ],
                    $this->skuUsageData
                )
            );

        // Build and register the interaction
        $this->builder
            ->given(
                'A SKU with skuId exists, the combination of projectId and externalId is unique, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful POST request to /sku-usage')
            ->with($request)
            ->willRespondWith($response);

        // Make the request
        // Uses GuzzleHttp/Client for now, to be replaced with real method(s) when the PHP client is implemented
        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        $response = $httpClient->request(
            'POST',
            '/sku-usage',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'body' => json_encode($this->skuUsageData)
            ]
        );

        // Make assertions that the expected data in the response is correct
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJson($response->getBody());
        $this->assertEquals($this->skuUsageData['skuId'], json_decode($response->getBody())->skuId);
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataUnauthorized()
    {
        // Invalid token
        $this->token = 'invalid_token';

        // Error code in response is 401, extra is not defined
        $this->errorResponse['code'] = '401';
        unset($this->errorResponse['extra']);

        $request = new ConsumerRequest();
        $request
            ->setMethod('POST')
            ->setPath('/sku-usage')
            ->addHeader('Authorization', 'Bearer ' . $this->token)
            ->addHeader('Content-Type', 'application/json')
            ->setBody($this->skuUsageData);

        $response = new ProviderResponse();
        $response
            ->setStatus(401)
            ->addHeader('Content-Type', 'application/json')
            ->setBody(['errors' => [$this->errorResponse]]);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /sku-usage')
            ->with($request)
            ->willRespondWith($response);

        // The request should throw an Exception, because the server sends a 401
        $this->expectException(ClientException::class);
        $this->expectExceptionMessageMatches('~401~');

        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        $httpClient->request(
            'POST',
            '/sku-usage',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'body' => json_encode($this->skuUsageData)
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataForbidden()
    {
        // Token with invalid scope
        $this->token = 'valid_token_invalid_scope';

        // Error code in response is 403, extra is not defined
        $this->errorResponse['code'] = '403';
        unset($this->errorResponse['extra']);

        $request = new ConsumerRequest();
        $request
            ->setMethod('POST')
            ->setPath('/sku-usage')
            ->addHeader('Authorization', 'Bearer ' . $this->token)
            ->addHeader('Content-Type', 'application/json')
            ->setBody($this->skuUsageData);

        $response = new ProviderResponse();
        $response
            ->setStatus(403)
            ->addHeader('Content-Type', 'application/json')
            ->setBody(['errors' => [$this->errorResponse]]);

        $this->builder
            ->given('A SKU with skuId exists, the request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /sku-usage')
            ->with($request)
            ->willRespondWith($response);

        // The request should throw an Exception, because the server sends a 403
        $this->expectException(ClientException::class);
        $this->expectExceptionMessageMatches('~403~');

        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        $httpClient->request(
            'POST',
            '/sku-usage',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'body' => json_encode($this->skuUsageData)
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataBadRequest()
    {
        // Error code in response is 400, extra is not defined
        $this->errorResponse['code'] = '400';
        unset($this->errorResponse['extra']);

        $request = new ConsumerRequest();
        $request
            ->setMethod('POST')
            ->setPath('/sku-usage')
            ->addHeader('Authorization', 'Bearer ' . $this->token)
            ->setBody('Bad request');

        $response = new ProviderResponse();
        $response
            ->setStatus(400)
            ->addHeader('Content-Type', 'application/json')
            ->setBody(['errors' => [$this->errorResponse]]);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /sku-usage')
            ->with($request)
            ->willRespondWith($response);

        // The request should throw an Exception, because the server sends a 400
        $this->expectException(ClientException::class);
        $this->expectExceptionMessageMatches('~400~');

        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        $httpClient->request(
            'POST',
            '/sku-usage',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'body' => 'Bad request'
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataUnprocessableEntity()
    {
        // SKU with skuId does not exist
        $this->skuUsageData['skuId'] = 'skuId_test_invalid';

        // Error code in response is 422
        $this->errorResponse['code'] = '422';

        $request = new ConsumerRequest();
        $request
            ->setMethod('POST')
            ->setPath('/sku-usage')
            ->addHeader('Authorization', 'Bearer ' . $this->token)
            ->addHeader('Content-Type', 'application/json')
            ->setBody($this->skuUsageData);

        $response = new ProviderResponse();
        $response
            ->setStatus(422)
            ->addHeader('Content-Type', 'application/json')
            ->setBody(['errors' => [$this->errorResponse]]);

        $this->builder
            ->given('The SKU with skuId does not exist')
            ->uponReceiving('POST request to /sku-usage with non-existent skuId')
            ->with($request)
            ->willRespondWith($response);

        // The request should throw an Exception, because the server sends a 422
        $this->expectException(ClientException::class);
        $this->expectExceptionMessageMatches('~422~');

        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        $httpClient->request(
            'POST',
            '/sku-usage',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'body' => json_encode($this->skuUsageData)
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testAddSKUUsageDataConflict()
    {
        // Combination of projectId and externalId already exists
        $this->skuUsageData['projectId'] = 'projectId_test_duplicate';
        $this->skuUsageData['externalId'] = 'projectId_test_duplicate';

        // Error code in response is 409
        $this->errorResponse['code'] = '409';
        $this->errorResponse['extra'] = [
            'externalId' => $this->skuUsageData['externalId']
        ];

        $request = new ConsumerRequest();
        $request
            ->setMethod('POST')
            ->setPath('/sku-usage')
            ->addHeader('Authorization', 'Bearer ' . $this->token)
            ->addHeader('Content-Type', 'application/json')
            ->setBody($this->skuUsageData);

        $response = new ProviderResponse();
        $response
            ->setStatus(409)
            ->addHeader('Content-Type', 'application/json')
            ->setBody(['errors' => [$this->errorResponse]]);

        $this->builder
            ->given('The combination of projectId and externalId already exists')
            ->uponReceiving('POST request to /sku-usage with already existent combination of projectId and externalId')
            ->with($request)
            ->willRespondWith($response);

        // The request should throw an Exception, because the server sends a 409
        $this->expectException(ClientException::class);
        $this->expectExceptionMessageMatches('~409~');

        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        $httpClient->request(
            'POST',
            '/sku-usage',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'body' => json_encode($this->skuUsageData)
            ]
        );
    }
}
