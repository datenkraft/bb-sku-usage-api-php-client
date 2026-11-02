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
        $normalizer = match ($normalizerClass) {
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuditLogNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuditLogNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuditLogCollectionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuditLogCollectionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionResourceNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionResourceNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionRolePaginatedCollectionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionRolePaginatedCollectionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionRoleResourceNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthPermissionRoleResourceNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleCollectionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleCollectionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleIdentityPaginatedCollectionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleIdentityPaginatedCollectionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleIdentityResourceNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleIdentityResourceNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleResourceNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\AuthRoleResourceNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\CollectionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\CollectionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\CollectionPaginationNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\CollectionPaginationNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorReferencesItemNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorReferencesItemNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorExtraNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorExtraNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorResponseNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\ErrorResponseNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\GetAuthPermissionCollectionResponseNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\GetAuthPermissionCollectionResponseNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\GetSkuUsageResponseNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\GetSkuUsageResponseNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\InformationNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\InformationNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\InformationResponseNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\InformationResponseNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\NewAuthRoleResourceNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\NewAuthRoleResourceNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\NewSkuUsageNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\NewSkuUsageNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PatchResponseTransactionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PatchResponseTransactionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PatchTransactionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PatchTransactionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PostResponseTransactionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\PostResponseTransactionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\SkuUsageNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\SkuUsageNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\TaskNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\TaskNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\TransactionNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\TransactionNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\UpdateResponseTaskNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\UpdateResponseTaskNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\UpdateTaskNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer\UpdateTaskNormalizer(),
            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\ReferenceNormalizer::class => new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\ReferenceNormalizer(),
            default => throw new \InvalidArgumentException('Unknown normalizer class: ' . $normalizerClass),
        };
        if ($normalizer instanceof \Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface) {
            $normalizer->setNormalizer($this->normalizer);
        }
        if ($normalizer instanceof \Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface) {
            $normalizer->setDenormalizer($this->denormalizer);
        }
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return array_combine(array_keys($this->normalizers), array_fill(0, count($this->normalizers), false));
    }
}