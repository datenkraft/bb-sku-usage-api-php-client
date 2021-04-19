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
 * Class SKUUsageConsumerAddSKUUsageTest
 * @package Pact
 */
class SKUUsageConsumerGetHealthcheckTest extends SKUUsageConsumerTest
{

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->requestHeaders = [];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->requestData = [];
        $this->responseData = [
            'currentDate' => date('Y-m-d H:i:s'),
        ];

        $this->path = '/healthcheck';
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @throws GuzzleException
     */
    public function testGetHealthcheckSuccess()
    {
        $this->expectedStatusCode = '200';
        $this->builder
            ->given('The GET request is valid')
            ->uponReceiving('Successful GET request to /healthcheck');

        $this->testSuccessResponse();
    }
}
