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
class SkuUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('skuUsageId', $data)) {
            $object->skuUsageId = $data['skuUsageId'];
            unset($data['skuUsageId']);
        }
        if (\array_key_exists('skuCode', $data)) {
            $object->skuCode = $data['skuCode'];
            unset($data['skuCode']);
        }
        if (\array_key_exists('quantity', $data)) {
            $object->quantity = $data['quantity'];
            unset($data['quantity']);
        }
        if (\array_key_exists('projectId', $data)) {
            $object->projectId = $data['projectId'];
            unset($data['projectId']);
        }
        if (\array_key_exists('usageStart', $data)) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['usageStart']);
            if (false === $date) {
                if (is_string($data['usageStart']) and 1 === preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(?:\.\d+)?(?:Z|[+-]\d{2}:\d{2})$/', $data['usageStart'])) {
                    try {
                        $date = new \DateTime($data['usageStart']);
                    } catch (\Exception) {
                        throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\InvalidDateException($data['usageStart'], 'Y-m-d\TH:i:sP');
                    }
                } else {
                    throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\InvalidDateException($data['usageStart'], 'Y-m-d\TH:i:sP');
                }
            }
            $object->usageStart = $date;
            unset($data['usageStart']);
        }
        if (\array_key_exists('usageEnd', $data)) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['usageEnd']);
            if (false === $date_1) {
                if (is_string($data['usageEnd']) and 1 === preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(?:\.\d+)?(?:Z|[+-]\d{2}:\d{2})$/', $data['usageEnd'])) {
                    try {
                        $date_1 = new \DateTime($data['usageEnd']);
                    } catch (\Exception) {
                        throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\InvalidDateException($data['usageEnd'], 'Y-m-d\TH:i:sP');
                    }
                } else {
                    throw new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\InvalidDateException($data['usageEnd'], 'Y-m-d\TH:i:sP');
                }
            }
            $object->usageEnd = $date_1;
            unset($data['usageEnd']);
        }
        if (\array_key_exists('externalId', $data)) {
            $object->externalId = $data['externalId'];
            unset($data['externalId']);
        }
        if (\array_key_exists('meta', $data) && $data['meta'] !== null) {
            $values = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\JsonObject();
            foreach ($data['meta'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->meta = $values;
            unset($data['meta']);
        }
        elseif (\array_key_exists('meta', $data)) {
            $object->meta = null;
            unset($data['meta']);
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
        if (array_key_exists('skuUsageId', get_object_vars($data)) && null !== ($data->skuUsageId ?? null)) {
            $dataArray['skuUsageId'] = $data->skuUsageId;
        }
        $dataArray['skuCode'] = $data->skuCode;
        $dataArray['quantity'] = $data->quantity;
        $dataArray['projectId'] = $data->projectId;
        $dataArray['usageStart'] = $data->usageStart->format('Y-m-d\TH:i:sP');
        $dataArray['usageEnd'] = $data->usageEnd->format('Y-m-d\TH:i:sP');
        $dataArray['externalId'] = $data->externalId;
        if (array_key_exists('meta', get_object_vars($data)) && null !== ($data->meta ?? null)) {
            $values = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\JsonObject();
            foreach ($data->meta as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['meta'] = $values;
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage::class => false];
    }
}