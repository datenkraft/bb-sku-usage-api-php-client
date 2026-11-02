<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class UpdateResponseTask implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Task Id
     *
     * @var string
     */
    public string $taskId;
    /**
     * Task Status
     *
     * @var string
     */
    public string $taskStatus;
    public function definedProperties(): array
    {
        return ['taskId' => 'taskId', 'taskStatus' => 'taskStatus'];
    }
}