<?php

namespace Pact;

use Exception;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Matcher\Matcher;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PHPUnit\Framework\TestCase;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SKUUsageConsumerTest
 * @package Pact
 */
abstract class SKUUsageConsumerTest extends TestCase
{
    protected InteractionBuilder $builder;
    protected MockServerEnvConfig $config;

    protected GuzzleHttpClient $guzzleClient;

    protected string $expectedExceptionClass = GuzzleException::class;

    protected string $token;

    protected string $method;
    protected string $path;
    protected string $query;
    protected array $queryParams;

    protected array $requestHeaders;
    protected array $responseHeaders;
    protected string $expectedStatusCode;

    protected array $requestData;
    protected array $responseData;
    protected array $errorResponse;

    protected Matcher $matcher;

    protected string $skuCode;
    protected string $projectId;
    protected string $projectIdDuplicate;
    protected string $externalId;
    protected string $externalIdDuplicate;
    protected string $taskIdGet;
    protected string $taskIdPatch;
    protected string $taskIdPost;
    protected string $taskIdNotFound;
    protected string $identityId;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Matcher for interactions with the mock server
        $this->matcher = new Matcher();

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

        $this->guzzleClient = new GuzzleHttpClient(['base_uri' => $this->config->getBaseUri()]);

        // Create the interaction builder
        $this->builder = new InteractionBuilder($this->config);

        // Example error response for testing
        $this->errorResponse = [
            'errors' => [
                [
                    'code' => '0',
                    'message' => $this->matcher->like('Example error message'),
                ]
            ]
        ];

        $this->skuCode = 'skuCode_test';
        $this->projectId = 'f1bb70c8-a197-4dcb-93d9-9896433a59db';
        $this->projectIdDuplicate = '1ca9abca-908d-4578-9073-54ee524a0bb8';
        $this->externalId = 'externalId_test';
        $this->externalIdDuplicate = 'externalId_test_duplicate';
        $this->taskIdGet = 'a84da9b8-dd8c-11eb-ba80-000000000000';
        $this->taskIdPatch = 'f5f25fba-dd8c-11eb-ba80-000000000000';
        $this->taskIdPost = 'ff007ace-dd8c-11eb-ba80-000000000000';
        $this->taskIdNotFound = '00000000-0000-0000-0000-000000000000';
        $this->identityId = '52fa4193-7644-45d5-bb21-c5acef208ff2';

        $this->queryParams = [];
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Verify that all registered interactions actually took place
        $this->builder->verify();
    }

    protected function beginTest(): void
    {
        $this->prepareTest();

        $response = $this->doClientRequest();

        $this->assertEquals($this->expectedStatusCode, $response->getStatusCode());
        $this->assertJson($response->getBody());
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
        if (isset($this->query)) {
            $request->setQuery($this->query);
        }
        if (is_array($this->queryParams)) {
            foreach ($this->queryParams as $queryParam => $value) {
                $request->addQueryParameter($queryParam, $value);
            }
        }

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

    abstract protected function doClientRequest(): ResponseInterface;
}
