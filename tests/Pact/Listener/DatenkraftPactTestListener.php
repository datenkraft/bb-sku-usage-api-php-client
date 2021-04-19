<?php

namespace Pact\Listener;

use GuzzleHttp\Psr7\Uri;
use PhpPact\Broker\Service\BrokerHttpClient;
use PhpPact\Http\GuzzleClient;
use PhpPact\Standalone\MockService\MockServerConfigInterface;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PhpPact\Standalone\MockService\Service\MockServerHttpService;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestListenerDefaultImplementation;
use PHPUnit\Framework\TestSuite;

/**
 * Class DatenkraftPactTestListener
 * @package Pact\Listener
 */
class DatenkraftPactTestListener implements TestListener
{
    use TestListenerDefaultImplementation;

    /**
     * Name of the test suite configured in your phpunit config.
     */
    protected array $testSuiteNames;

    protected MockServerConfigInterface $mockServerConfig;

    protected bool $failed = false;

    /**
     * DatenkraftPactTestListener constructor.
     * @param array $testSuiteNames test suite names that need evaluated with the listener
     */
    public function __construct(array $testSuiteNames)
    {
        $this->testSuiteNames = $testSuiteNames;
        $this->mockServerConfig = new MockServerEnvConfig();
    }

    /**
     * Publish JSON results to PACT Broker.
     *
     * @param TestSuite $suite
     */
    public function endTestSuite(TestSuite $suite): void
    {
        if (in_array($suite->getName(), $this->testSuiteNames)) {
            $httpService = new MockServerHttpService(new GuzzleClient(), $this->mockServerConfig);
            $httpService->verifyInteractions();

            $json = $httpService->getPactJson();

            if ($this->failed === true) {
                print 'A unit test has failed. Skipping PACT file upload.';
            } elseif (!($pactBrokerUri = getenv('PACT_BROKER_URI'))) {
                print 'PACT_BROKER_URI environment variable was not set. Skipping PACT file upload.';
            } elseif (!($consumerVersion = getenv('PACT_CONSUMER_VERSION'))) {
                print 'PACT_CONSUMER_VERSION environment variable was not set. Skipping PACT file upload.';
            } elseif (!($tag = getenv('PACT_CONSUMER_TAG'))) {
                print 'PACT_CONSUMER_TAG environment variable was not set. Skipping PACT file upload.';
            } else {
                $clientConfig = [];
                if (
                    ($user = getenv('PACT_BROKER_HTTP_AUTH_USER')) &&
                    ($pass = getenv('PACT_BROKER_HTTP_AUTH_PASS'))
                ) {
                    $clientConfig = [
                        'auth' => [$user, $pass],
                    ];
                }

                if (($sslVerify = getenv('PACT_BROKER_SSL_VERIFY'))) {
                    $clientConfig['verify'] = $sslVerify !== 'no';
                }

                $headers = [];
                if ($bearerToken = getenv('PACT_BROKER_BEARER_TOKEN')) {
                    $headers['Authorization'] = 'Bearer ' . $bearerToken;
                }

                $client = new GuzzleClient($clientConfig);

                $brokerHttpService = new BrokerHttpClient($client, new Uri($pactBrokerUri), $headers);
                $brokerHttpService->tag($this->mockServerConfig->getConsumer(), $consumerVersion, $tag);
                $brokerHttpService->publishJson($json, $consumerVersion);
                print 'Pact file has been uploaded to the Broker successfully.';
            }

            $httpService->deleteAllInteractions();
        }
    }
}
