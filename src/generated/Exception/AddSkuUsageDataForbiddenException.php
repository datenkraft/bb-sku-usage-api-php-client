<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Datenkraft\Backbone\SkuUsageClient\Generated\Exception;

class AddSkuUsageDataForbiddenException extends \RuntimeException implements ClientException
{
    private $errorModel;

    public function __construct(\Datenkraft\Backbone\SkuUsageClient\Generated\Model\ErrorModel $errorModel)
    {
        parent::__construct('Forbidden', 403);
        $this->errorModel = $errorModel;
    }

    public function getErrorModel()
    {
        return $this->errorModel;
    }
}
