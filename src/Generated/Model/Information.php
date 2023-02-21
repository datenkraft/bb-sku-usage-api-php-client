<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class Information
{
    /**
     * Code
     *
     * @var string
     */
    protected $code;
    /**
     * Message
     *
     * @var string
     */
    protected $message;
    /**
     * 
     *
     * @var ErrorExtra
     */
    protected $extra;
    /**
     * Code
     *
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }
    /**
     * Code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode(string $code) : self
    {
        $this->code = $code;
        return $this;
    }
    /**
     * Message
     *
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }
    /**
     * Message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message) : self
    {
        $this->message = $message;
        return $this;
    }
    /**
     * 
     *
     * @return ErrorExtra
     */
    public function getExtra() : ErrorExtra
    {
        return $this->extra;
    }
    /**
     * 
     *
     * @param ErrorExtra $extra
     *
     * @return self
     */
    public function setExtra(ErrorExtra $extra) : self
    {
        $this->extra = $extra;
        return $this;
    }
}