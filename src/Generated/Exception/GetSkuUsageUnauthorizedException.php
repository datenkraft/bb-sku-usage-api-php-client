<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class GetSkuUsageUnauthorizedException extends UnauthorizedException
{
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Unauthorized', 401);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}