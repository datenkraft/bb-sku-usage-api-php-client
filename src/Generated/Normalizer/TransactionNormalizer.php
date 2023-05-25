<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\CheckArray;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
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
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Transaction';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Transaction';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Transaction();
        if (null === $data || false === \is_array($data)) {
            return $object;
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
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['requestData'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setRequestData($values);
            unset($data['requestData']);
        }
        if (\array_key_exists('responseData', $data)) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
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
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('transactionId') && null !== $object->getTransactionId()) {
            $data['transactionId'] = $object->getTransactionId();
        }
        if ($object->isInitialized('transactionStatus') && null !== $object->getTransactionStatus()) {
            $data['transactionStatus'] = $object->getTransactionStatus();
        }
        if ($object->isInitialized('transactionSeen') && null !== $object->getTransactionSeen()) {
            $data['transactionSeen'] = $object->getTransactionSeen();
        }
        if ($object->isInitialized('transactionResourceType') && null !== $object->getTransactionResourceType()) {
            $data['transactionResourceType'] = $object->getTransactionResourceType();
        }
        if ($object->isInitialized('entryCount') && null !== $object->getEntryCount()) {
            $data['entryCount'] = $object->getEntryCount();
        }
        if ($object->isInitialized('requestData') && null !== $object->getRequestData()) {
            $values = array();
            foreach ($object->getRequestData() as $key => $value) {
                $values[$key] = $value;
            }
            $data['requestData'] = $values;
        }
        if ($object->isInitialized('responseData') && null !== $object->getResponseData()) {
            $values_1 = array();
            foreach ($object->getResponseData() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['responseData'] = $values_1;
        }
        foreach ($object as $key_2 => $value_2) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_2;
            }
        }
        return $data;
    }
}