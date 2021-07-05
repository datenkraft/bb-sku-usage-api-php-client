<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class PatchResponseTransaction
{
    /**
     * Transaction Id
     *
     * @var string
     */
    protected $transactionId;
    /**
     * Transaction Status
     *
     * @var string
     */
    protected $transactionStatus;
    /**
     * Transaction has been seen
     *
     * @var bool
     */
    protected $transactionSeen;
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
    /**
     * Transaction Status
     *
     * @return string
     */
    public function getTransactionStatus() : string
    {
        return $this->transactionStatus;
    }
    /**
     * Transaction Status
     *
     * @param string $transactionStatus
     *
     * @return self
     */
    public function setTransactionStatus(string $transactionStatus) : self
    {
        $this->transactionStatus = $transactionStatus;
        return $this;
    }
    /**
     * Transaction has been seen
     *
     * @return bool
     */
    public function getTransactionSeen() : bool
    {
        return $this->transactionSeen;
    }
    /**
     * Transaction has been seen
     *
     * @param bool $transactionSeen
     *
     * @return self
     */
    public function setTransactionSeen(bool $transactionSeen) : self
    {
        $this->transactionSeen = $transactionSeen;
        return $this;
    }
}