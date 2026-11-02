<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class ErrorExtra implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * External Id
     *
     * @var string
     */
    public string $externalId;
    public function definedProperties(): array
    {
        return ['externalId' => 'externalId'];
    }
}