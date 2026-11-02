<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint;

class GetSkuUsage extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Query SKU Usage data by projectId and externalId OR skuUsageIds OR skuGroupIds. At least one of
     * those three options must be given. Combining projectId and externalId with skuUsageIds is not possible.',
     * summary: 'Query SKU Usage data by projectId and externalId OR by skuUsageIds OR by skuGroupIds.
     * At least one of those three options must be given. Combining projectId and externalId
     * with skuUsageIds is not possible.
     * @param array{
     *    "filter[projectId]"?: string, //ProjectId filter - Required with filter[externalId] - Must not be present with filter[skuUsageIds]
     *    "filter[externalId]"?: string, //ExternalId filter - Required with filter[projectId] - Must not be present with filter[skuUsageIds]
     *    "filter[skuUsageIds]"?: string, //SkuUsageIds filter - Must not be present with filter[projectId] and filter[externalId]
     *    "filter[skuGroupIds]"?: string, //SkuGroupIds filter
     * } $queryParameters
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }
    use \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/sku-usage';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['filter[projectId]', 'filter[externalId]', 'filter[skuUsageIds]', 'filter[skuGroupIds]']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('filter[projectId]', ['string']);
        $optionsResolver->addAllowedTypes('filter[externalId]', ['string']);
        $optionsResolver->addAllowedTypes('filter[skuUsageIds]', ['string']);
        $optionsResolver->addAllowedTypes('filter[skuGroupIds]', ['string']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetSkuUsageResponse|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Symfony\Contracts\HttpClient\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getContent(false);
        if ($contentType !== null && (200 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetSkuUsageResponse', 'json');
        }
        if ($contentType !== null && (400 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageBadRequestException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageUnauthorizedException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageForbiddenException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (500 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if (stripos(strtolower((string) $contentType), 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException($status, $body, $response);
    }
    public function getAuthenticationScopes(): array
    {
        return ['oAuthAuthorization', 'bearerAuth'];
    }
    public function getFetchMode(): string
    {
        return \Jane\Component\OpenApiRuntime\Client\FetchMode::Eager->value;
    }
    public function getTargetClass(): ?string
    {
        return null;
    }
}