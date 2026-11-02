<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class UpdateTask implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Task Status
     *
     * @var string
     */
    public string $taskStatus;
    public function definedProperties(): array
    {
        return ['taskStatus' => 'taskStatus'];
    }
}