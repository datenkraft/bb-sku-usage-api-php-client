<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\CheckArray;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class NewSkuUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('skuCode', $data)) {
            $object->setSkuCode($data['skuCode']);
            unset($data['skuCode']);
        }
        if (\array_key_exists('quantity', $data)) {
            $object->setQuantity($data['quantity']);
            unset($data['quantity']);
        }
        if (\array_key_exists('projectId', $data)) {
            $object->setProjectId($data['projectId']);
            unset($data['projectId']);
        }
        if (\array_key_exists('usageStart', $data)) {
            $object->setUsageStart(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['usageStart']));
            unset($data['usageStart']);
        }
        if (\array_key_exists('usageEnd', $data)) {
            $object->setUsageEnd(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['usageEnd']));
            unset($data['usageEnd']);
        }
        if (\array_key_exists('externalId', $data)) {
            $object->setExternalId($data['externalId']);
            unset($data['externalId']);
        }
        if (\array_key_exists('meta', $data) && $data['meta'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['meta'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setMeta($values);
            unset($data['meta']);
        }
        elseif (\array_key_exists('meta', $data) && $data['meta'] === null) {
            $object->setMeta(null);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['skuCode'] = $data->getSkuCode();
        $dataArray['quantity'] = $data->getQuantity();
        $dataArray['projectId'] = $data->getProjectId();
        $dataArray['usageStart'] = $data->getUsageStart()->format('Y-m-d\TH:i:sP');
        $dataArray['usageEnd'] = $data->getUsageEnd()->format('Y-m-d\TH:i:sP');
        $dataArray['externalId'] = $data->getExternalId();
        if ($data->isInitialized('meta')) {
            $values = [];
            foreach ($data->getMeta() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['meta'] = $values;
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\NewSkuUsage::class => false];
    }
}