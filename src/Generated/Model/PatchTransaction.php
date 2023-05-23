<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class PatchTransaction extends \ArrayObject
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
        $this->initialized['transactionSeen'] = true;
        $this->transactionSeen = $transactionSeen;
        return $this;
    }
}