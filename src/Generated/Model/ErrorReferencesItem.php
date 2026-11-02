<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class ErrorReferencesItem implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * The reference to the field causing the error
     *
     * @var string
     */
    public string $key;
    /**
     * The value of the field causing the error
     *
     * @var mixed
     */
    public $value;
    public function definedProperties(): array
    {
        return ['key' => 'key', 'value' => 'value'];
    }
}