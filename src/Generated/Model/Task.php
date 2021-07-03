<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class Task
{
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
     * Entry Count
     *
     * @var int
     */
    protected $entryCount;
    /**
     * 
     *
     * @var PatchTransaction
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
        $this->taskStatus = $taskStatus;
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
        $this->entryCount = $entryCount;
        return $this;
    }
    /**
     * 
     *
     * @return PatchTransaction
     */
    public function getTransactions() : PatchTransaction
    {
        return $this->transactions;
    }
    /**
     * 
     *
     * @param PatchTransaction $transactions
     *
     * @return self
     */
    public function setTransactions(PatchTransaction $transactions) : self
    {
        $this->transactions = $transactions;
        return $this;
    }
}