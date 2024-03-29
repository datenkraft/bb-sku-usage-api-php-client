<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class Task extends \ArrayObject
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
     * Task Id
     *
     * @var string
     */
    protected $taskId;
    /**
     * Task Status
     *
     * @var string
     */
    protected $taskStatus;
    /**
     * Identity ID
     *
     * @var string
     */
    protected $identityId;
    /**
     * Entry Count
     *
     * @var int
     */
    protected $entryCount;
    /**
     * Transactions
     *
     * @var PatchResponseTransaction[]
     */
    protected $transactions;
    /**
     * Task Id
     *
     * @return string
     */
    public function getTaskId() : string
    {
        return $this->taskId;
    }
    /**
     * Task Id
     *
     * @param string $taskId
     *
     * @return self
     */
    public function setTaskId(string $taskId) : self
    {
        $this->initialized['taskId'] = true;
        $this->taskId = $taskId;
        return $this;
    }
    /**
     * Task Status
     *
     * @return string
     */
    public function getTaskStatus() : string
    {
        return $this->taskStatus;
    }
    /**
     * Task Status
     *
     * @param string $taskStatus
     *
     * @return self
     */
    public function setTaskStatus(string $taskStatus) : self
    {
        $this->initialized['taskStatus'] = true;
        $this->taskStatus = $taskStatus;
        return $this;
    }
    /**
     * Identity ID
     *
     * @return string
     */
    public function getIdentityId() : string
    {
        return $this->identityId;
    }
    /**
     * Identity ID
     *
     * @param string $identityId
     *
     * @return self
     */
    public function setIdentityId(string $identityId) : self
    {
        $this->initialized['identityId'] = true;
        $this->identityId = $identityId;
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
     * Transactions
     *
     * @return PatchResponseTransaction[]
     */
    public function getTransactions() : array
    {
        return $this->transactions;
    }
    /**
     * Transactions
     *
     * @param PatchResponseTransaction[] $transactions
     *
     * @return self
     */
    public function setTransactions(array $transactions) : self
    {
        $this->initialized['transactions'] = true;
        $this->transactions = $transactions;
        return $this;
    }
}