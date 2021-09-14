<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class PatchTaskForbiddenException extends ForbiddenException
{
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Forbidden', 403);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}