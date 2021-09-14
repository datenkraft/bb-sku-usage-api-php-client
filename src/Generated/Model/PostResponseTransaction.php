<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class PostResponseTransaction
{
    /**
     * Transaction Id
     *
     * @var string
     */
    protected $transactionId;
    /**
     * Transaction Id
     *
     * @return string
     */
    public function getTransactionId() : string
    {
        return $this->transactionId;
    }
    /**
     * Transaction Id
     *
     * @param string $transactionId
     *
     * @return self
     */
    public function setTransactionId(string $transactionId) : self
    {
        $this->transactionId = $transactionId;
        return $this;
    }
}