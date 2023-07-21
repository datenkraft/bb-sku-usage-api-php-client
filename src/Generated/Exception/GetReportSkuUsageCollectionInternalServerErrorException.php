<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class GetReportSkuUsageCollectionInternalServerErrorException extends InternalServerErrorException
{
    /**
     * @var \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Server Error');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}