<?php

namespace Pact;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

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
            'date' => $this->matcher->like(date('Y-m-d H:i:s')),
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
