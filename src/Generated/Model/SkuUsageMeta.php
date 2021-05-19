<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class SkuUsageMeta
{
    /**
     * Amount
     *
     * @var int
     */
    protected $amount;
    /**
     * Currency
     *
     * @var string
     */
    protected $currency;
    /**
     * Description
     *
     * @var string
     */
    protected $description;
    /**
     * Amount
     *
     * @return int
     */
    public function getAmount() : int
    {
        return $this->amount;
    }
    /**
     * Amount
     *
     * @param int $amount
     *
     * @return self
     */
    public function setAmount(int $amount) : self
    {
        $this->amount = $amount;
        return $this;
    }
    /**
     * Currency
     *
     * @return string
     */
    public function getCurrency() : string
    {
        return $this->currency;
    }
    /**
     * Currency
     *
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency(string $currency) : self
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Description
     *
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }
    /**
     * Description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description) : self
    {
        $this->description = $description;
        return $this;
    }
}