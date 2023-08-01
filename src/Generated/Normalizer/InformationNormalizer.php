<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class InformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Information';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\Information';
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
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\Information();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('code', $data)) {
            $object->setCode($data['code']);
        }
        if (\array_key_exists('message', $data)) {
            $object->setMessage($data['message']);
        }
        if (\array_key_exists('references', $data)) {
            $values = array();
            foreach ($data['references'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorReferencesItem', 'json', $context);
            }
            $object->setReferences($values);
        }
        if (\array_key_exists('extra', $data)) {
            $object->setExtra($this->denormalizer->denormalize($data['extra'], 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\ErrorExtra', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['code'] = $object->getCode();
        $data['message'] = $object->getMessage();
        if (null !== $object->getReferences()) {
            $values = array();
            foreach ($object->getReferences() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['references'] = $values;
        }
        if (null !== $object->getExtra()) {
            $data['extra'] = $this->normalizer->normalize($object->getExtra(), 'json', $context);
        }
        return $data;
    }
}