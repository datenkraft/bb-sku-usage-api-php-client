<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class ErrorExtra
{
    /**
     * External Id
     *
     * @var string
     */
    protected $externalId;
    /**
     * External Id
     *
     * @return string
     */
    public function getExternalId() : string
    {
        return $this->externalId;
    }
    /**
     * External Id
     *
     * @param string $externalId
     *
     * @return self
     */
    public function setExternalId(string $externalId) : self
    {
        $this->externalId = $externalId;
        return $this;
    }
}