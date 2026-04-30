<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

class GetSkuUsageResponse extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var CollectionPagination
     */
    protected $pagination;
    /**
     * @var list<array<string, mixed>>
     */
    protected $data;
    /**
     * @return CollectionPagination
     */
    public function getPagination(): CollectionPagination
    {
        return $this->pagination;
    }
    /**
     * @param CollectionPagination $pagination
     *
     * @return self
     */
    public function setPagination(CollectionPagination $pagination): self
    {
        $this->initialized['pagination'] = true;
        $this->pagination = $pagination;
        return $this;
    }
    /**
     * @return list<array<string, mixed>>
     */
    public function getData(): array
    {
        return $this->data;
    }
    /**
     * @param list<array<string, mixed>> $data
     *
     * @return self
     */
    public function setData(array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}