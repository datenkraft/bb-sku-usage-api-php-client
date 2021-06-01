<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated;

class Client extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getOpenApi(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetOpenApi(), $fetch);
    }
    /**
     * Get the openapi documentation in the specified format (yaml or json, fallback is json)
     *
     * @param string $format Openapi file format
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetOpenApiInFormatInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getOpenApiInFormat(string $format, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetOpenApiInFormat($format), $fetch);
    }
    /**
     * Add SKU Usage data
     *
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage[] $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\AddSkuUsageUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\AddSkuUsageForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\AddSkuUsageUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\AddSkuUsageConflictException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\AddSkuUsageBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\AddSkuUsageInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage[]|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function addSkuUsage(array $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\AddSkuUsage($requestBody), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('/UNDEFINED');
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer(array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\JaneObjectNormalizer()), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}