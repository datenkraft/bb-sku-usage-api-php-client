<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class PatchTransaction
{
    /**
     * Transaction has been seen
     *
     * @var mixed
     */
    protected $transactionSeen;
    /**
     * Transaction has been seen
     *
     * @return mixed
     */
    public function getTransactionSeen()
    {
        return $this->transactionSeen;
    }
    /**
     * Transaction has been seen
     *
     * @param mixed $transactionSeen
     *
     * @return self
     */
    public function setTransactionSeen($transactionSeen) : self
    {
        $this->transactionSeen = $transactionSeen;
        return $this;
    }
}