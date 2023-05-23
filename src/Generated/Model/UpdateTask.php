<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class UpdateTask extends \ArrayObject
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
     * Task Status
     *
     * @var string
     */
    protected $taskStatus;
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