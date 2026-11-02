<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class GetSkuUsageResponse implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var CollectionPagination
     */
    public CollectionPagination $pagination;
    /**
     * @var list<iterable<string, mixed>>
     */
    public array $data;
    public function definedProperties(): array
    {
        return ['pagination' => 'pagination', 'data' => 'data'];
    }
}