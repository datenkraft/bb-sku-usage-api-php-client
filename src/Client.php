<?php

declare(strict_types=1);

namespace Datenkraft\Backbone\Client\SkuUsageApi;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;

/**
 * Class Client
 * @package Datenkraft\Backbone\Client\SkuUsageApi
 */
class Client extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Client
{
    /**
     * @param ClientFactory $clientFactory
     * @param string|null $endpointUrl
     * @return static
     */
    public static function createWithFactory(ClientFactory $clientFactory, string $endpointUrl = null): self
    {
        $endpointUrl = $endpointUrl ?? getenv('X_DATENKRAFT_SKU_USAGE_API_URL') ?: null;

        return $clientFactory->createClient(static::class, $endpointUrl);
    }
}
