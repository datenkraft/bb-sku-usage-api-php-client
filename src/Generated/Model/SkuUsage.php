<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class SkuUsage extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * SKU Usage Id
     *
     * @var string
     */
    protected $skuUsageId;
    /**
     * SKU Code
     *
     * @var string
     */
    protected $skuCode;
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
    * External Id,
    Note: This is not required if the skuCode is 'su-manual-correction'.
    *
    * @var string
    */
    protected $externalId;
    /**
     * Meta
     *
     * @var mixed[]|null
     */
    protected $meta;
    /**
     * SKU Usage Id
     *
     * @return string
     */
    public function getSkuUsageId() : string
    {
        return $this->skuUsageId;
    }
    /**
     * SKU Usage Id
     *
     * @param string $skuUsageId
     *
     * @return self
     */
    public function setSkuUsageId(string $skuUsageId) : self
    {
        $this->initialized['skuUsageId'] = true;
        $this->skuUsageId = $skuUsageId;
        return $this;
    }
    /**
     * SKU Code
     *
     * @return string
     */
    public function getSkuCode() : string
    {
        return $this->skuCode;
    }
    /**
     * SKU Code
     *
     * @param string $skuCode
     *
     * @return self
     */
    public function setSkuCode(string $skuCode) : self
    {
        $this->initialized['skuCode'] = true;
        $this->skuCode = $skuCode;
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
        $this->initialized['quantity'] = true;
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
        $this->initialized['projectId'] = true;
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
        $this->initialized['usageStart'] = true;
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
        $this->initialized['usageEnd'] = true;
        $this->usageEnd = $usageEnd;
        return $this;
    }
    /**
    * External Id,
    Note: This is not required if the skuCode is 'su-manual-correction'.
    *
    * @return string
    */
    public function getExternalId() : string
    {
        return $this->externalId;
    }
    /**
    * External Id,
    Note: This is not required if the skuCode is 'su-manual-correction'.
    *
    * @param string $externalId
    *
    * @return self
    */
    public function setExternalId(string $externalId) : self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * Meta
     *
     * @return mixed[]|null
     */
    public function getMeta() : ?iterable
    {
        return $this->meta;
    }
    /**
     * Meta
     *
     * @param mixed[]|null $meta
     *
     * @return self
     */
    public function setMeta(?iterable $meta) : self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;
        return $this;
    }
}