<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class SkuUsage
{
    /**
     * SKU Usage Id.
     *
     * @var int
     */
    protected $skuUsageId;
    /**
     * SKU Id.
     *
     * @var string
     */
    protected $skuId;
    /**
     * Quantity.
     *
     * @var int
     */
    protected $quantity;
    /**
     * Project Id.
     *
     * @var string
     */
    protected $projectId;
    /**
     * Start time of the usage.
     *
     * @var \DateTime
     */
    protected $usageStart;
    /**
     * End time of the usage.
     *
     * @var \DateTime
     */
    protected $usageEnd;
    /**
     * External Id.
     *
     * @var string
     */
    protected $externalId;
    /**
     * @var SkuUsageMeta
     */
    protected $meta;

    /**
     * SKU Usage Id.
     */
    public function getSkuUsageId(): int
    {
        return $this->skuUsageId;
    }

    /**
     * SKU Usage Id.
     */
    public function setSkuUsageId(int $skuUsageId): self
    {
        $this->skuUsageId = $skuUsageId;

        return $this;
    }

    /**
     * SKU Id.
     */
    public function getSkuId(): string
    {
        return $this->skuId;
    }

    /**
     * SKU Id.
     */
    public function setSkuId(string $skuId): self
    {
        $this->skuId = $skuId;

        return $this;
    }

    /**
     * Quantity.
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Quantity.
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Project Id.
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }

    /**
     * Project Id.
     */
    public function setProjectId(string $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Start time of the usage.
     */
    public function getUsageStart(): \DateTime
    {
        return $this->usageStart;
    }

    /**
     * Start time of the usage.
     */
    public function setUsageStart(\DateTime $usageStart): self
    {
        $this->usageStart = $usageStart;

        return $this;
    }

    /**
     * End time of the usage.
     */
    public function getUsageEnd(): \DateTime
    {
        return $this->usageEnd;
    }

    /**
     * End time of the usage.
     */
    public function setUsageEnd(\DateTime $usageEnd): self
    {
        $this->usageEnd = $usageEnd;

        return $this;
    }

    /**
     * External Id.
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * External Id.
     */
    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getMeta(): SkuUsageMeta
    {
        return $this->meta;
    }

    public function setMeta(SkuUsageMeta $meta): self
    {
        $this->meta = $meta;

        return $this;
    }
}
