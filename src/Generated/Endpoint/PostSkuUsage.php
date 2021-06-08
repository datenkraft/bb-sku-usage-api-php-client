<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint;

class PostSkuUsage extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Add SKU Usage data
     *
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage[] $requestBody 
     */
    public function __construct(array $requestBody)
    {
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/sku-usage';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if (is_array($this->body) and isset($this->body[0]) and $this->body[0] instanceof \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageConflictException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage[]|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\SkuUsage[]', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageUnprocessableEntityException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageConflictException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array('oAuthAuthorization');
    }
}