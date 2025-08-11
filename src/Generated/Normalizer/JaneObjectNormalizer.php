<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\CheckArray;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = [
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuditLog::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuditLogNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuditLogCollection::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuditLogCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionResource::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRolePaginatedCollection::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionRolePaginatedCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionRoleResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleCollection::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityPaginatedCollection::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleIdentityPaginatedCollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityResource::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleIdentityResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleResource::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Collection::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\CollectionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\CollectionPagination::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\CollectionPaginationNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Error::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorReferencesItem::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorReferencesItemNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorExtra::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorExtraNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetAuthPermissionCollectionResponse::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\GetAuthPermissionCollectionResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetSkuUsageResponse::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\GetSkuUsageResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Information::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\InformationNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\InformationResponse::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\InformationResponseNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewAuthRoleResource::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\NewAuthRoleResourceNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\NewSkuUsageNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchResponseTransaction::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PatchResponseTransactionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchTransaction::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PatchTransactionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PostResponseTransaction::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PostResponseTransactionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\SkuUsageNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\TaskNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\TransactionNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateResponseTask::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\UpdateResponseTaskNormalizer::class,
        
        \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateTask::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\UpdateTaskNormalizer::class,
        
        \Jane\Component\JsonSchemaRuntime\Reference::class => \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\ReferenceNormalizer::class,
    ], $normalizersCache = [];
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[get_class($data)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($data, $format, $context);
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $type, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [
            
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuditLog::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuditLogCollection::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionResource::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRolePaginatedCollection::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthPermissionRoleResource::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleCollection::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityPaginatedCollection::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleIdentityResource::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\AuthRoleResource::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Collection::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\CollectionPagination::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Error::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorReferencesItem::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorExtra::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\ErrorResponse::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetAuthPermissionCollectionResponse::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\GetSkuUsageResponse::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Information::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\InformationResponse::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewAuthRoleResource::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchResponseTransaction::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchTransaction::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PostResponseTransaction::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateResponseTask::class => false,
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\UpdateTask::class => false,
            \Jane\Component\JsonSchemaRuntime\Reference::class => false,
        ];
    }
}