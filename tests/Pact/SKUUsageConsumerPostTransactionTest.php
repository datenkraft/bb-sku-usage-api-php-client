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
 * Class SKUUsageConsumerPostTransactionTest
 * @package Pact
 */
class SKUUsageConsumerPostTransactionTest extends SKUUsageConsumerTest
{

    /** @var string */
    protected $taskId;
    /** @var string */
    protected $taskIdValid;
    /** @var string */
    protected $taskIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->token = getenv('VALID_TOKEN_BB_SKU_USAGE_TRANSACTION_POST');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json',
        ];

        $this->taskIdValid = $this->taskIdPost;
        $this->taskIdInvalid = 'taskId_invalid';
        $this->taskId = $this->taskIdValid;

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
                        'test' => 'test',
                    ],
                ],
            ],
        ];

        $this->responseData = [
            'transactionId' => $this->matcher->uuid(),
        ];

        $this->path = '/task/' . $this->taskId . '/transaction/sku-usage';
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testPostTransactionSuccess()
    {
        $this->expectedStatusCode = '202';

        // Build and register the interaction
        $this->builder
            ->given(
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful POST request to /task/{taskId}/transaction/sku-usage');

        $this->beginTest();
    }

    public function testPostTransactionUnauthorized()
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401, extra is not defined
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /task/{taskId}/transaction/sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostTransactionForbidden()
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_GET');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403, extra is not defined
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('A SKU with skuCode exists, the request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /task/{taskId}/transaction/sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testPostTransactionBadRequest()
    {
        $this->markTestSkipped(
            'Cannot be tested because there is no validation of the request data for the transaction'
        );

        /*
        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        // empty skuCode
        $this->requestData[0]['skuCode'] = '';

        $this->builder
            ->given('The skuCode in the request is empty')
            ->uponReceiving('Bad POST request to /task/{taskId}/transaction/sku-usage');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
        */
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

        return $client->postTransaction($this->taskId, $skuUsages, Client::FETCH_RESPONSE);
    }
}
