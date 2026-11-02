<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class PatchTransaction implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Transaction has been seen
     *
     * @var bool
     */
    public bool $transactionSeen;
    public function definedProperties(): array
    {
        return ['transactionSeen' => 'transactionSeen'];
    }
}