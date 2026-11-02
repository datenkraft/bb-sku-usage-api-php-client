<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class PostResponseTransaction implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Transaction Id
     *
     * @var string
     */
    public string $transactionId;
    public function definedProperties(): array
    {
        return ['transactionId' => 'transactionId'];
    }
}