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
class SkuUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\SkuUsage';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\SkuUsageApi\\Generated\\Model\\SkuUsage';
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
        $object = new \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('skuUsageId', $data)) {
            $object->setSkuUsageId($data['skuUsageId']);
            unset($data['skuUsageId']);
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
            $object->setUsageStart(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['usageStart']));
            unset($data['usageStart']);
        }
        if (\array_key_exists('usageEnd', $data)) {
            $object->setUsageEnd(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['usageEnd']));
            unset($data['usageEnd']);
        }
        if (\array_key_exists('externalId', $data)) {
            $object->setExternalId($data['externalId']);
            unset($data['externalId']);
        }
        if (\array_key_exists('meta', $data) && $data['meta'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
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
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('skuUsageId') && null !== $object->getSkuUsageId()) {
            $data['skuUsageId'] = $object->getSkuUsageId();
        }
        $data['skuCode'] = $object->getSkuCode();
        $data['quantity'] = $object->getQuantity();
        $data['projectId'] = $object->getProjectId();
        $data['usageStart'] = $object->getUsageStart()->format('Y-m-d\\TH:i:sP');
        $data['usageEnd'] = $object->getUsageEnd()->format('Y-m-d\\TH:i:sP');
        $data['externalId'] = $object->getExternalId();
        if ($object->isInitialized('meta') && null !== $object->getMeta()) {
            $values = array();
            foreach ($object->getMeta() as $key => $value) {
                $values[$key] = $value;
            }
            $data['meta'] = $values;
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_1;
            }
        }
        return $data;
    }
}