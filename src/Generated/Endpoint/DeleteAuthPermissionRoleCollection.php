<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint;

class DeleteAuthPermissionRoleCollection extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Delete one or more role to permission assignments in this resource server
     * @param null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource[] $requestBody
     */
    public function __construct(?array $requestBody = null)
    {
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return '/auth/permission-role';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer): array
    {
        if (is_array($this->body) and isset($this->body[0]) and $this->body[0] instanceof \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Symfony\Contracts\HttpClient\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = $response->getContent(false);
        if (204 === $status) {
            return null;
        }
        if ($contentType !== null && (400 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionBadRequestException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (401 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionUnauthorizedException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (403 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionForbiddenException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (422 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionUnprocessableEntityException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
        }
        if ($contentType !== null && (500 === $status && stripos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse', 'json'), $response);
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