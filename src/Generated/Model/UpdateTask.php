<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class UpdateTask
{
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
        $this->taskStatus = $taskStatus;
        return $this;
    }
}