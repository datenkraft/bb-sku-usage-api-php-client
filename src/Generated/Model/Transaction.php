<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class Transaction extends \ArrayObject
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
     * Transaction Seen
     *
     * @var bool
     */
    protected $transactionSeen;
    /**
     * Transaction Resource Type
     *
     * @var string
     */
    protected $transactionResourceType;
    /**
     * Entry Count
     *
     * @var int
     */
    protected $entryCount;
    /**
     * Request Data
     *
     * @var mixed[]
     */
    protected $requestData;
    /**
     * Response Data
     *
     * @var mixed[]
     */
    protected $responseData;
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
        $this->initialized['transactionId'] = true;
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
        $this->initialized['transactionStatus'] = true;
        $this->transactionStatus = $transactionStatus;
        return $this;
    }
    /**
     * Transaction Seen
     *
     * @return bool
     */
    public function getTransactionSeen() : bool
    {
        return $this->transactionSeen;
    }
    /**
     * Transaction Seen
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
    /**
     * Transaction Resource Type
     *
     * @return string
     */
    public function getTransactionResourceType() : string
    {
        return $this->transactionResourceType;
    }
    /**
     * Transaction Resource Type
     *
     * @param string $transactionResourceType
     *
     * @return self
     */
    public function setTransactionResourceType(string $transactionResourceType) : self
    {
        $this->initialized['transactionResourceType'] = true;
        $this->transactionResourceType = $transactionResourceType;
        return $this;
    }
    /**
     * Entry Count
     *
     * @return int
     */
    public function getEntryCount() : int
    {
        return $this->entryCount;
    }
    /**
     * Entry Count
     *
     * @param int $entryCount
     *
     * @return self
     */
    public function setEntryCount(int $entryCount) : self
    {
        $this->initialized['entryCount'] = true;
        $this->entryCount = $entryCount;
        return $this;
    }
    /**
     * Request Data
     *
     * @return mixed[]
     */
    public function getRequestData() : iterable
    {
        return $this->requestData;
    }
    /**
     * Request Data
     *
     * @param mixed[] $requestData
     *
     * @return self
     */
    public function setRequestData(iterable $requestData) : self
    {
        $this->initialized['requestData'] = true;
        $this->requestData = $requestData;
        return $this;
    }
    /**
     * Response Data
     *
     * @return mixed[]
     */
    public function getResponseData() : iterable
    {
        return $this->responseData;
    }
    /**
     * Response Data
     *
     * @param mixed[] $responseData
     *
     * @return self
     */
    public function setResponseData(iterable $responseData) : self
    {
        $this->initialized['responseData'] = true;
        $this->responseData = $responseData;
        return $this;
    }
}