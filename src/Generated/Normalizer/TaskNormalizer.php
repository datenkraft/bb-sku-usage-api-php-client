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
class TaskNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('taskId', $data)) {
            $object->taskId = $data['taskId'];
            unset($data['taskId']);
        }
        if (\array_key_exists('taskStatus', $data)) {
            $object->taskStatus = $data['taskStatus'];
            unset($data['taskStatus']);
        }
        if (\array_key_exists('identityId', $data)) {
            $object->identityId = $data['identityId'];
            unset($data['identityId']);
        }
        if (\array_key_exists('entryCount', $data)) {
            $object->entryCount = $data['entryCount'];
            unset($data['entryCount']);
        }
        if (\array_key_exists('transactions', $data)) {
            $values = [];
            foreach ($data['transactions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchResponseTransaction::class, 'json', $context);
            }
            $object->transactions = $values;
            unset($data['transactions']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['taskId'] = $data->taskId;
        $dataArray['taskStatus'] = $data->taskStatus;
        $dataArray['identityId'] = $data->identityId;
        $dataArray['entryCount'] = $data->entryCount;
        $values = [];
        foreach ($data->transactions as $value) {
            $normalized = $value === null ? null : $this->normalizer->normalize($value, 'json', $context);
            $values[] = \is_iterable($normalized) ? new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\JsonObject($normalized) : $normalized;
        }
        $dataArray['transactions'] = $values;
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Task::class => false];
    }
}