<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class SkuUsage
{
    /**
     * SKU Usage Id
     *
     * @var int
     */
    protected $skuUsageId;
    /**
     * SKU Id
     *
     * @var string
     */
    protected $skuId;
    /**
     * Quantity
     *
     * @var int
     */
    protected $quantity;
    /**
     * Project Id
     *
     * @var string
     */
    protected $projectId;
    /**
     * Start time of the usage
     *
     * @var \DateTime
     */
    protected $usageStart;
    /**
     * End time of the usage
     *
     * @var \DateTime
     */
    protected $usageEnd;
    /**
     * External Id
     *
     * @var string
     */
    protected $externalId;
    /**
     * Meta
     *
     * @var mixed
     */
    protected $meta;
    /**
     * SKU Usage Id
     *
     * @return int
     */
    public function getSkuUsageId() : int
    {
        return $this->skuUsageId;
    }
    /**
     * SKU Usage Id
     *
     * @param int $skuUsageId
     *
     * @return self
     */
    public function setSkuUsageId(int $skuUsageId) : self
    {
        $this->skuUsageId = $skuUsageId;
        return $this;
    }
    /**
     * SKU Id
     *
     * @return string
     */
    public function getSkuId() : string
    {
        return $this->skuId;
    }
    /**
     * SKU Id
     *
     * @param string $skuId
     *
     * @return self
     */
    public function setSkuId(string $skuId) : self
    {
        $this->skuId = $skuId;
        return $this;
    }
    /**
     * Quantity
     *
     * @return int
     */
    public function getQuantity() : int
    {
        return $this->quantity;
    }
    /**
     * Quantity
     *
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity(int $quantity) : self
    {
        $this->quantity = $quantity;
        return $this;
    }
    /**
     * Project Id
     *
     * @return string
     */
    public function getProjectId() : string
    {
        return $this->projectId;
    }
    /**
     * Project Id
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId) : self
    {
        $this->projectId = $projectId;
        return $this;
    }
    /**
     * Start time of the usage
     *
     * @return \DateTime
     */
    public function getUsageStart() : \DateTime
    {
        return $this->usageStart;
    }
    /**
     * Start time of the usage
     *
     * @param \DateTime $usageStart
     *
     * @return self
     */
    public function setUsageStart(\DateTime $usageStart) : self
    {
        $this->usageStart = $usageStart;
        return $this;
    }
    /**
     * End time of the usage
     *
     * @return \DateTime
     */
    public function getUsageEnd() : \DateTime
    {
        return $this->usageEnd;
    }
    /**
     * End time of the usage
     *
     * @param \DateTime $usageEnd
     *
     * @return self
     */
    public function setUsageEnd(\DateTime $usageEnd) : self
    {
        $this->usageEnd = $usageEnd;
        return $this;
    }
    /**
     * External Id
     *
     * @return string
     */
    public function getExternalId() : string
    {
        return $this->externalId;
    }
    /**
     * External Id
     *
     * @param string $externalId
     *
     * @return self
     */
    public function setExternalId(string $externalId) : self
    {
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * Meta
     *
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }
    /**
     * Meta
     *
     * @param mixed $meta
     *
     * @return self
     */
    public function setMeta($meta) : self
    {
        $this->meta = $meta;
        return $this;
    }
}