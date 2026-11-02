<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class PatchResponseTransaction implements AdditionalPropertiesInterface
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
     * Transaction has been seen
     *
     * @var bool
     */
    public bool $transactionSeen;
    public function definedProperties(): array
    {
        return ['transactionId' => 'transactionId', 'transactionStatus' => 'transactionStatus', 'transactionSeen' => 'transactionSeen'];
    }
}