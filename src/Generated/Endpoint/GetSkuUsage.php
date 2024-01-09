<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint;

class GetSkuUsage extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Endpoint
{
    /**
    * Query SKU Usage data by projectId and externalId OR skuUsageIds OR skuGroupIds. At least one of
    those three options must be given. Combining projectId and externalId with skuUsageIds is not possible.',
    summary: 'Query SKU Usage data by projectId and externalId OR by skuUsageIds OR by skuGroupIds.
    At least one of those three options must be given. Combining projectId and externalId
    with skuUsageIds is not possible.
    *
    * @param array $queryParameters {
    *     @var string $filter[projectId] ProjectId filter - Required with filter[externalId] - Must not be present with filter[skuUsageIds]
    *     @var string $filter[externalId] ExternalId filter - Required with filter[projectId] - Must not be present with filter[skuUsageIds]
    *     @var string $filter[skuUsageIds] SkuUsageIds filter - Must not be present with filter[projectId] and filter[externalId]
    *     @var string $filter[skuGroupIds] SkuGroupIds filter
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/sku-usage';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('filter[projectId]', 'filter[externalId]', 'filter[skuUsageIds]', 'filter[skuGroupIds]'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('filter[projectId]', array('string'));
        $optionsResolver->addAllowedTypes('filter[externalId]', array('string'));
        $optionsResolver->addAllowedTypes('filter[skuUsageIds]', array('string'));
        $optionsResolver->addAllowedTypes('filter[skuGroupIds]', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetSkuUsageResponse|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\GetSkuUsageResponse', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array('oAuthAuthorization', 'bearerAuth');
    }
}