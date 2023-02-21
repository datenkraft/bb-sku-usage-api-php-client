<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception;

class GetChangelogInFormatNotFoundException extends NotFoundException
{
    public function __construct()
    {
        parent::__construct('Changelog not found');
    }
}