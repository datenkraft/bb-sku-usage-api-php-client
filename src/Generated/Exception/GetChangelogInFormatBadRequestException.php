<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class GetChangelogInFormatBadRequestException extends BadRequestException
{
    public function __construct()
    {
        parent::__construct('Invalid format');
    }
}