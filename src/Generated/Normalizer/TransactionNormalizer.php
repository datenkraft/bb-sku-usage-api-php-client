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
class TransactionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('transactionSeen', $data) && \is_int($data['transactionSeen'])) {
            $data['transactionSeen'] = (bool) $data['transactionSeen'];
        }
        if (\array_key_exists('transactionId', $data)) {
            $object->setTransactionId($data['transactionId']);
            unset($data['transactionId']);
        }
        if (\array_key_exists('transactionStatus', $data)) {
            $object->setTransactionStatus($data['transactionStatus']);
            unset($data['transactionStatus']);
        }
        if (\array_key_exists('transactionSeen', $data)) {
            $object->setTransactionSeen($data['transactionSeen']);
            unset($data['transactionSeen']);
        }
        if (\array_key_exists('transactionResourceType', $data)) {
            $object->setTransactionResourceType($data['transactionResourceType']);
            unset($data['transactionResourceType']);
        }
        if (\array_key_exists('entryCount', $data)) {
            $object->setEntryCount($data['entryCount']);
            unset($data['entryCount']);
        }
        if (\array_key_exists('requestData', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['requestData'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setRequestData($values);
            unset($data['requestData']);
        }
        if (\array_key_exists('responseData', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['responseData'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setResponseData($values_1);
            unset($data['responseData']);
        }
        foreach ($data as $key_2 => $value_2) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_2;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('transactionId') && null !== $data->getTransactionId()) {
            $dataArray['transactionId'] = $data->getTransactionId();
        }
        if ($data->isInitialized('transactionStatus') && null !== $data->getTransactionStatus()) {
            $dataArray['transactionStatus'] = $data->getTransactionStatus();
        }
        if ($data->isInitialized('transactionSeen') && null !== $data->getTransactionSeen()) {
            $dataArray['transactionSeen'] = $data->getTransactionSeen();
        }
        if ($data->isInitialized('transactionResourceType') && null !== $data->getTransactionResourceType()) {
            $dataArray['transactionResourceType'] = $data->getTransactionResourceType();
        }
        if ($data->isInitialized('entryCount') && null !== $data->getEntryCount()) {
            $dataArray['entryCount'] = $data->getEntryCount();
        }
        if ($data->isInitialized('requestData') && null !== $data->getRequestData()) {
            $values = [];
            foreach ($data->getRequestData() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['requestData'] = $values;
        }
        if ($data->isInitialized('responseData') && null !== $data->getResponseData()) {
            $values_1 = [];
            foreach ($data->getResponseData() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $dataArray['responseData'] = $values_1;
        }
        foreach ($data as $key_2 => $value_2) {
            if (preg_match('/.*/', (string) $key_2)) {
                $dataArray[$key_2] = $value_2;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction::class => false];
    }
}