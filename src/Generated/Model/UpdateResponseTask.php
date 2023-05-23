<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class UpdateResponseTask extends \ArrayObject
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
}