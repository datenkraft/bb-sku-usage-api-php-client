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
    protected $normalizers = array('Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorResponse' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\ErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Error' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\ErrorNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorExtra' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\ErrorExtraNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\SkuUsage' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\SkuUsageNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\NewSkuUsage' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\NewSkuUsageNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\UpdateTask' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\UpdateTaskNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\UpdateResponseTask' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\UpdateResponseTaskNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Task' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\TaskNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PatchTransaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\PatchTransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PatchResponseTransaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\PatchResponseTransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Transaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\TransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PostResponseTransaction' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\PostResponseTransactionNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthPermissionResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthPermissionResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthRoleIdentityResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthRoleIdentityResourceNormalizer', 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\AuthRoleResource' => 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Normalizer\\AuthRoleResourceNormalizer', '\\Jane\\JsonSchemaRuntime\\Reference' => '\\Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
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