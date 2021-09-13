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
class PatchResponseTransactionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PatchResponseTransaction';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\PatchResponseTransaction';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\PatchResponseTransaction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('transactionId', $data)) {
            $object->setTransactionId($data['transactionId']);
        }
        if (\array_key_exists('transactionStatus', $data)) {
            $object->setTransactionStatus($data['transactionStatus']);
        }
        if (\array_key_exists('transactionSeen', $data)) {
            $object->setTransactionSeen($data['transactionSeen']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['transactionId'] = $object->getTransactionId();
        $data['transactionStatus'] = $object->getTransactionStatus();
        $data['transactionSeen'] = $object->getTransactionSeen();
        return $data;
    }
}