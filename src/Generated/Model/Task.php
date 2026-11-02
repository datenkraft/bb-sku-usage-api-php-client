<?php

namespace Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model;

use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalAndPatternProperties;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Runtime\AdditionalPropertiesInterface;
class Task implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * Task Id
     *
     * @var string
     */
    public string $taskId;
    /**
     * Task Status
     *
     * @var string
     */
    public string $taskStatus;
    /**
     * Identity ID
     *
     * @var string
     */
    public string $identityId;
    /**
     * Entry Count
     *
     * @var int
     */
    public int $entryCount;
    /**
     * Transactions
     *
     * @var list<PatchResponseTransaction>
     */
    public array $transactions;
    public function definedProperties(): array
    {
        return ['taskId' => 'taskId', 'taskStatus' => 'taskStatus', 'identityId' => 'identityId', 'entryCount' => 'entryCount', 'transactions' => 'transactions'];
    }
}