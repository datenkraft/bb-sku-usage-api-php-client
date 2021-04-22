<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Datenkraft\Backbone\SkuUsageClient\Generated\Normalizer;

use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NewSkuUsageDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Datenkraft\\Backbone\\SkuUsageClient\\Generated\\Model\\NewSkuUsageData';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\SkuUsageClient\\Generated\\Model\\NewSkuUsageData';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Datenkraft\Backbone\SkuUsageClient\Generated\Model\NewSkuUsageData();
        if (\array_key_exists('skuId', $data)) {
            $object->setSkuId($data['skuId']);
        }
        if (\array_key_exists('quantity', $data)) {
            $object->setQuantity($data['quantity']);
        }
        if (\array_key_exists('projectId', $data)) {
            $object->setProjectId($data['projectId']);
        }
        if (\array_key_exists('usageStart', $data)) {
            $object->setUsageStart(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['usageStart']));
        }
        if (\array_key_exists('usageEnd', $data)) {
            $object->setUsageEnd(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['usageEnd']));
        }
        if (\array_key_exists('externalId', $data)) {
            $object->setExternalId($data['externalId']);
        }
        if (\array_key_exists('meta', $data)) {
            $object->setMeta($this->denormalizer->denormalize($data['meta'], 'Datenkraft\\Backbone\\SkuUsageClient\\Generated\\Model\\Meta', 'json', $context));
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getSkuId()) {
            $data['skuId'] = $object->getSkuId();
        }
        if (null !== $object->getQuantity()) {
            $data['quantity'] = $object->getQuantity();
        }
        if (null !== $object->getProjectId()) {
            $data['projectId'] = $object->getProjectId();
        }
        if (null !== $object->getUsageStart()) {
            $data['usageStart'] = $object->getUsageStart()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getUsageEnd()) {
            $data['usageEnd'] = $object->getUsageEnd()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getExternalId()) {
            $data['externalId'] = $object->getExternalId();
        }
        if (null !== $object->getMeta()) {
            $data['meta'] = $this->normalizer->normalize($object->getMeta(), 'json', $context);
        }

        return $data;
    }
}
