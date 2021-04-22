<?php

namespace Pact;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PHPUnit\Framework\TestCase;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerTest
 * @package Pact
 */
abstract class SKUUsageConsumerTest extends TestCase
{
    protected InteractionBuilder $builder;
    protected MockServerEnvConfig $config;

    protected string $expectedExceptionClass = GuzzleException::class;

    protected string $token;

    protected string $method;
    protected string $path;

    protected array $requestHeaders;
    protected array $responseHeaders;
    protected int $expectedStatusCode;

    protected array $requestData;
    protected array $responseData;
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
                'Mock server not running. Make sure the Testsuite was started with the PactTestListener: ' .
                $exception->getMessage()
            );
        }

        // Create the interaction builder
        $this->builder = new InteractionBuilder($this->config);

        // Example error response for testing
        $this->errorResponse = [
            'errors' => [
                [
                    'code' => '0',
                    'message' => 'Example error message'
                ]
            ]
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
    protected function testSuccessResponse(): void
    {
        $this->prepareTest();

        $response = $this->doRequest(
            $this->method,
            $this->path,
            ['headers' => $this->requestHeaders, 'body' => json_encode($this->requestData)]
        );

        $this->assertEquals($this->expectedStatusCode, $response->getStatusCode());
        $this->assertJson($response->getBody());
        $this->assertEquals($this->responseData, json_decode($response->getBody(), true));
    }

    /**
     * @throws GuzzleException
     */
    protected function testErrorResponse(): void
    {
        $this->responseData = $this->errorResponse;
        $this->prepareTest();

        $this->expectException($this->expectedExceptionClass);
        $this->expectExceptionMessageMatches('~' . $this->expectedStatusCode . '~');

        $this->doRequest(
            $this->method,
            $this->path,
            ['headers' => $this->requestHeaders, 'body' => json_encode($this->requestData)]
        );
    }

    protected function prepareTest(): void
    {
        $consumerRequest = $this->createConsumerRequest(
            $this->method,
            $this->path,
            $this->requestHeaders,
            $this->requestData
        );
        $providerResponse = $this->createProviderResponse(
            $this->expectedStatusCode,
            $this->responseHeaders,
            $this->responseData
        );

        $this->builder->with($consumerRequest)->willRespondWith($providerResponse);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $requestHeaders
     * @param array $requestBody
     * @return ConsumerRequest
     */
    protected function createConsumerRequest(
        string $method,
        string $path,
        array $requestHeaders,
        array $requestBody = []
    ): ConsumerRequest {
        $request = new ConsumerRequest();
        $request->setMethod($method)->setPath($path);
        foreach ($requestHeaders as $header => $value) {
            $request->addHeader($header, $value);
        }
        if (!empty($requestBody)) {
            $request->setBody($requestBody);
        }
        return $request;
    }

    /**
     * @param int $statusCode
     * @param array $responseHeaders
     * @param array $responseBody
     * @return ProviderResponse
     */
    protected function createProviderResponse(
        int $statusCode,
        array $responseHeaders,
        array $responseBody
    ): ProviderResponse {
        $response = new ProviderResponse();
        $response->setStatus($statusCode);
        foreach ($responseHeaders as $header => $value) {
            $response->addHeader($header, $value);
        }
        $response->setBody($responseBody);
        return $response;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function doRequest(string $method, string $path, array $options): ResponseInterface
    {
        // Uses GuzzleHttp/Client for now, to be replaced with real method(s) when the PHP client is implemented
        $httpClient = new Client(['base_uri' => $this->config->getBaseUri()]);
        return $httpClient->request($method, $path, $options);
    }
}
