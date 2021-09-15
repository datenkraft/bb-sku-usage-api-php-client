<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class PatchTransaction
{
    /**
     * Transaction has been seen
     *
     * @var bool
     */
    protected $transactionSeen;
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