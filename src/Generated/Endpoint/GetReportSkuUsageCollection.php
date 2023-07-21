<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint;

class GetReportSkuUsageCollection extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Query a list of sku usage ids that match the selected filters
     *
     * @param array $queryParameters {
     *     @var string $filter[projectId] Project Id
     *     @var string $filter[usageStart] Start of the usage
     *     @var string $filter[usageEnd] End of the usage
     *     @var string $filter[metaKey] Key of the meta field
     *     @var string $filter[metaValue] Value of the meta field
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
        return '/report/sku-usage';
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
        $optionsResolver->setDefined(array('filter[projectId]', 'filter[usageStart]', 'filter[usageEnd]', 'filter[metaKey]', 'filter[metaValue]'));
        $optionsResolver->setRequired(array('filter[projectId]', 'filter[metaKey]', 'filter[metaValue]'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('filter[projectId]', array('string'));
        $optionsResolver->setAllowedTypes('filter[usageStart]', array('string'));
        $optionsResolver->setAllowedTypes('filter[usageEnd]', array('string'));
        $optionsResolver->setAllowedTypes('filter[metaKey]', array('string'));
        $optionsResolver->setAllowedTypes('filter[metaValue]', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetReportSkuUsageCollectionInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
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