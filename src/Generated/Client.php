<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated;

class Client extends \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\Client
{
    /**
     * Get the audit log.
     * @param array{
     *    "page"?: int, //The page to read. Default is the first page.
     *    "pageSize"?: int, //The maximum size per page is 100. Default is 100.
     *    "paginationMode"?: string, //The paginationMode to use:
     *                               //- default: The total number of items in the collection will not be calculated.
     *                               //- totalCount: The total number of items in the collection will be calculated.
     *                               //This can mean loss of performance.
     *    "filter[endpoint]"?: string, //A filter for restricting the audit log to a endpoint.
     *    "filter[version]"?: string, //A filter for restricting the audit log to a endpoint version.
     *    "filter[identifier]"?: mixed, //A filter for querying actions for a identifier.
     * } $queryParameters
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuditLogCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuditLogCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuditLogCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuditLogCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuditLogCollection|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getAuditLogCollection(array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetAuditLogCollection($queryParameters));
    }
    /**
     * Delete one or more role to permission assignments in this resource server
     * @param null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource[] $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthPermissionRoleCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function deleteAuthPermissionRoleCollection(?array $requestBody = null)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\DeleteAuthPermissionRoleCollection($requestBody));
    }
    /**
     * Get all role to permission assignments from this resource server
     * @param array{
     *    "page"?: int, //The page to read. Default is the first page.
     *    "pageSize"?: int, //The maximum size per page is 100. Default is 100.
     *    "paginationMode"?: string, //The paginationMode to use:
     *                               //- default: The total number of items in the collection will not be calculated.
     *                               //- totalCount: The total number of items in the collection will be calculated.
     *                               //This can mean loss of performance.
     * } $queryParameters
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthPermissionRoleCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthPermissionRoleCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthPermissionRoleCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRolePaginatedCollection|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getAuthPermissionRoleCollection(array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetAuthPermissionRoleCollection($queryParameters));
    }
    /**
     * Create one or more role to permission assignments in this resource server
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource[] $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthPermissionRoleCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthPermissionRoleCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthPermissionRoleCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthPermissionRoleCollectionConflictException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthPermissionRoleCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthPermissionRoleCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource[]|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function postAuthPermissionRoleCollection(array $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PostAuthPermissionRoleCollection($requestBody));
    }
    /**
     * Get all permissions from this resource server
     * @param array{
     *    "page"?: int, //The page to read. Default is the first page.
     *    "pageSize"?: int, //The maximum size per page is 100. Default is 100.
     *    "paginationMode"?: string, //The paginationMode to use:
     *                               //- default: The total number of items in the collection will not be calculated.
     *                               //- totalCount: The total number of items in the collection will be calculated.
     *                               //This can mean loss of performance.
     * } $queryParameters
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthPermissionCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthPermissionCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthPermissionCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetAuthPermissionCollectionResponse|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getAuthPermissionCollection(array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetAuthPermissionCollection($queryParameters));
    }
    /**
     * Delete one or more role to identity assignments in this resource server
     * @param null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityResource[] $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleIdentityCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleIdentityCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function deleteAuthRoleIdentityCollection(?array $requestBody = null)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\DeleteAuthRoleIdentityCollection($requestBody));
    }
    /**
     * Get all role to identity assignments from this resource server
     * @param array{
     *    "page"?: int, //The page to read. Default is the first page.
     *    "pageSize"?: int, //The maximum size per page is 100. Default is 100.
     *    "paginationMode"?: string, //The paginationMode to use:
     *                               //- default: The total number of items in the collection will not be calculated.
     *                               //- totalCount: The total number of items in the collection will be calculated.
     *                               //This can mean loss of performance.
     * } $queryParameters
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityPaginatedCollection|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getAuthRoleIdentityCollection(array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetAuthRoleIdentityCollection($queryParameters));
    }
    /**
     * Create one or more role to identity assignments in this resource server
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityResource[] $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleIdentityCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleIdentityCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleIdentityCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleIdentityCollectionConflictException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleIdentityCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleIdentityCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityResource[]|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function postAuthRoleIdentityCollection(array $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PostAuthRoleIdentityCollection($requestBody));
    }
    /**
     * Get all available roles from this resource server
     * @param array{
     *    "page"?: int, //The page to read. Default is the first page.
     *    "pageSize"?: int, //The maximum size per page is 100. Default is 100.
     *    "paginationMode"?: string, //The paginationMode to use:
     *                               //- default: The total number of items in the collection will not be calculated.
     *                               //- totalCount: The total number of items in the collection will be calculated.
     *                               //This can mean loss of performance.
     * } $queryParameters
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleCollection|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getAuthRoleCollection(array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetAuthRoleCollection($queryParameters));
    }
    /**
     * Delete a role for this resource server
     * @param string $roleCode Identifier for the role
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\DeleteAuthRoleInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function deleteAuthRole(string $roleCode)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\DeleteAuthRole($roleCode));
    }
    /**
     * Get a role from this resource server by its roleCode
     * @param string $roleCode Identifier for the role
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetAuthRoleInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleResource|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getAuthRole(string $roleCode)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetAuthRole($roleCode));
    }
    /**
     * Patch a role for this resource server
     * @param string $roleCode Identifier for the role
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewAuthRoleResource $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchAuthRoleBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchAuthRoleUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchAuthRoleForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchAuthRoleNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchAuthRoleInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleResource|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function patchAuthRole(string $roleCode, \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewAuthRoleResource $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PatchAuthRole($roleCode, $requestBody));
    }
    /**
     * Post a role for this resource server
     * @param string $roleCode Identifier for the role
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewAuthRoleResource $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleConflictException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostAuthRoleInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleResource|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function postAuthRole(string $roleCode, \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewAuthRoleResource $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PostAuthRole($roleCode, $requestBody));
    }
    /**
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null
     */
    public function getOpenApi()
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetOpenApi());
    }
    /**
     * Get the changelog in the specified format
     * @param string $format Changelog file format
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetChangelogInFormatNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetChangelogInFormatBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null
     */
    public function getChangelogInFormat(string $format)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetChangelogInFormat($format));
    }
    /**
     * Get the openapi documentation in the specified format
     * @param string $format Openapi file format
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetOpenApiInFormatBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return null
     */
    public function getOpenApiInFormat(string $format)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetOpenApiInFormat($format));
    }
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
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetSkuUsageInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetSkuUsageResponse|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getSkuUsage(array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetSkuUsage($queryParameters));
    }
    /**
     * Add SKU Usage data
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage[] $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageCollectionConflictException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageCollectionUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostSkuUsageCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage[]|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function postSkuUsageCollection(array $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PostSkuUsageCollection($requestBody));
    }
    /**
     * Query Task data by taskId
     * @param string $taskId Task id
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTaskBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTaskUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTaskForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTaskNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTaskInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getTask(string $taskId)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetTask($taskId));
    }
    /**
     * Update one or more fields of a Task
     * @param string $taskId Task Id
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateTask $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTaskBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTaskUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTaskForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTaskNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTaskUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTaskInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateResponseTask|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function patchTask(string $taskId, \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateTask $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PatchTask($taskId, $requestBody));
    }
    /**
     * Add a Transaction of SKU Usages to a Task
     * @param string $taskId Task id
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage[] $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostTransactionSkuUsageCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostTransactionSkuUsageCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostTransactionSkuUsageCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PostTransactionSkuUsageCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PostResponseTransaction|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function postTransactionSkuUsageCollection(string $taskId, array $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PostTransactionSkuUsageCollection($taskId, $requestBody));
    }
    /**
     * Get Transactions From a Task
     * @param string $taskId Task id
     * @param string $transactionId Transaction id
     * @param array{
     *    "fields"?: string, //Fields to include in the response (separated by comma)
     * } $queryParameters
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTransactionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTransactionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTransactionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTransactionNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\GetTransactionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function getTransaction(string $taskId, string $transactionId, array $queryParameters = [])
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\GetTransaction($taskId, $transactionId, $queryParameters));
    }
    /**
     * Update one or more fields of a Transaction
     * @param string $taskId Task id
     * @param string $transactionId Transaction id
     * @param \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchTransaction $requestBody
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTransactionBadRequestException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTransactionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTransactionForbiddenException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTransactionNotFoundException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\PatchTransactionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Exception\BadResponseException
     *
     * @return \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchResponseTransaction|\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse
     */
    public function patchTransaction(string $taskId, string $transactionId, \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchTransaction $requestBody)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Endpoint\PatchTransaction($taskId, $transactionId, $requestBody));
    }
    /**
     * @param list<callable(\Symfony\Contracts\HttpClient\HttpClientInterface): \Symfony\Contracts\HttpClient\HttpClientInterface> $additionalPlugins HttpClientInterface decorator factories, applied left-to-right after the server URL decorator
     * @param list<\Symfony\Component\Serializer\Normalizer\NormalizerInterface|\Symfony\Component\Serializer\Normalizer\DenormalizerInterface> $additionalNormalizers
     */
    public static function create(?\Symfony\Contracts\HttpClient\HttpClientInterface $httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [], bool $applyServerPlugins = true)
    {
        $plugins = [];
        if (null === $httpClient) {
            $httpClient = \Symfony\Component\HttpClient\HttpClient::create();
        }
        if ($applyServerPlugins) {
            $plugins[] = new \Jane\Component\OpenApiRuntime\Client\Plugin\ServerUrlHttpClient('https://sku-usage-api.steve.niceshops.com/v2');
        }
        if (count($additionalPlugins) > 0) {
            $plugins = array_merge($plugins, $additionalPlugins);
        }
        foreach ($plugins as $plugin) {
            $httpClient = $plugin($httpClient);
        }
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\JaneObjectNormalizer()];
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true])), new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Client\FormEncoder()]);
        return new static($httpClient, $serializer);
    }
}