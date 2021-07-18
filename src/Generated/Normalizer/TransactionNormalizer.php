<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\CheckArray;
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
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Transaction';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Transaction';
    }
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
        }
        if (\array_key_exists('transactionStatus', $data)) {
            $object->setTransactionStatus($data['transactionStatus']);
        }
        if (\array_key_exists('transactionResourceType', $data)) {
            $object->setTransactionResourceType($data['transactionResourceType']);
        }
        if (\array_key_exists('entryCount', $data)) {
            $object->setEntryCount($data['entryCount']);
        }
        if (\array_key_exists('requestData', $data)) {
            $object->setRequestData($data['requestData']);
        }
        if (\array_key_exists('responseData', $data)) {
            $object->setResponseData($data['responseData']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getTransactionId()) {
            $data['transactionId'] = $object->getTransactionId();
        }
        if (null !== $object->getTransactionStatus()) {
            $data['transactionStatus'] = $object->getTransactionStatus();
        }
        if (null !== $object->getTransactionResourceType()) {
            $data['transactionResourceType'] = $object->getTransactionResourceType();
        }
        if (null !== $object->getEntryCount()) {
            $data['entryCount'] = $object->getEntryCount();
        }
        if (null !== $object->getRequestData()) {
            $data['requestData'] = $object->getRequestData();
        }
        if (null !== $object->getResponseData()) {
            $data['responseData'] = $object->getResponseData();
        }
        return $data;
    }
}