<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class Transaction implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Transaction Id
     *
     * @var string
     */
    public string $transactionId;
    /**
     * Transaction Status
     *
     * @var string
     */
    public string $transactionStatus;
    /**
     * Transaction Seen
     *
     * @var bool
     */
    public bool $transactionSeen;
    /**
     * Transaction Resource Type
     *
     * @var string
     */
    public string $transactionResourceType;
    /**
     * Entry Count
     *
     * @var int
     */
    public int $entryCount;
    /**
     * Request Data
     *
     * @var iterable<string, mixed>
     */
    public iterable $requestData;
    /**
     * Response Data
     *
     * @var iterable<string, mixed>
     */
    public iterable $responseData;
    public function definedProperties(): array
    {
        return ['transactionId' => 'transactionId', 'transactionStatus' => 'transactionStatus', 'transactionSeen' => 'transactionSeen', 'transactionResourceType' => 'transactionResourceType', 'entryCount' => 'entryCount', 'requestData' => 'requestData', 'responseData' => 'responseData'];
    }
}