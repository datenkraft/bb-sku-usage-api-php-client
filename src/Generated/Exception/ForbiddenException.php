<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class ForbiddenException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 403);
    }
}