<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class GetAuthRoleCollectionUnauthorizedException extends UnauthorizedException
{
    public function __construct(
        /**
         * @var \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
         */
        private readonly \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse $errorResponse,
        /**
         * @var \Symfony\Contracts\HttpClient\ResponseInterface
         */
        private readonly \Symfony\Contracts\HttpClient\ResponseInterface $response
    )
    {
        parent::__construct('Unauthorized

Error codes:
- AUTHORIZATION_MISSING: No valid authentication information was given.');
    }
    public function getErrorResponse(): \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse(): \Symfony\Contracts\HttpClient\ResponseInterface
    {
        return $this->response;
    }
}