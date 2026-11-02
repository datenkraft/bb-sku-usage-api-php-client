<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class NewSkuUsage implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * SKU Code
     *
     * @var string
     */
    public string $skuCode;
    /**
     * Quantity
     *
     * @var int
     */
    public int $quantity;
    /**
     * Project Id
     *
     * @var string
     */
    public string $projectId;
    /**
     * Start time of the usage
     *
     * @var \DateTime
     */
    public \DateTime $usageStart;
    /**
     * End time of the usage
     *
     * @var \DateTime
     */
    public \DateTime $usageEnd;
    /**
     * External Id,
     * Note: This is not required if the skuCode is 'su-manual-correction'.
     *
     * @var string
     */
    public string $externalId;
    /**
     * Meta
     *
     * @var iterable<string, mixed>|null
     */
    public ?iterable $meta;
    public function definedProperties(): array
    {
        return ['skuCode' => 'skuCode', 'quantity' => 'quantity', 'projectId' => 'projectId', 'usageStart' => 'usageStart', 'usageEnd' => 'usageEnd', 'externalId' => 'externalId', 'meta' => 'meta'];
    }
}