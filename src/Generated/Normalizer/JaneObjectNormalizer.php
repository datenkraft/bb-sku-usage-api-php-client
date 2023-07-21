<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\CheckArray;
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
    protected $normalizers = array('Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuditLog' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuditLogNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuditLogCollection' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuditLogCollectionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthPermissionResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthPermissionResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthPermissionRoleResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthPermissionRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthRoleIdentityResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthRoleIdentityResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthRoleResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Collection' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\CollectionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\CollectionPagination' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\CollectionPaginationNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Error' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\ErrorNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorExtra' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\ErrorExtraNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\ErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Information' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\InformationNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\InformationResponse' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\InformationResponseNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\NewAuthRoleResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\NewAuthRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\NewSkuUsage' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\NewSkuUsageNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PatchResponseTransaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\PatchResponseTransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PatchTransaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\PatchTransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PostResponseTransaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\PostResponseTransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\SkuUsage' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\SkuUsageNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Task' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\TaskNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Transaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\TransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\UpdateResponseTask' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\UpdateResponseTaskNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\UpdateTask' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\UpdateTaskNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
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
}