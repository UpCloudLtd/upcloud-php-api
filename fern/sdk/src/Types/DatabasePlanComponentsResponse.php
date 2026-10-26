<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Structured breakdown of a service plan into compute, storage and backups components. Sizes are expressed in GB to match plan naming; the classic MB/MiB fields on the plan object are unchanged.
 */
class DatabasePlanComponentsResponse extends JsonSerializableType
{
    /**
     * @var ?DatabasePlanComponentsResponseCompute $compute Compute resources per service
     */
    #[JsonProperty('compute')]
    public ?DatabasePlanComponentsResponseCompute $compute;

    /**
     * @var ?DatabasePlanComponentsResponseStorage $storage Storage included in the plan. Omitted for service types without persistent storage.
     */
    #[JsonProperty('storage')]
    public ?DatabasePlanComponentsResponseStorage $storage;

    /**
     * @var ?DatabasePlanComponentsResponseBackups $backups Backup characteristics of the plan
     */
    #[JsonProperty('backups')]
    public ?DatabasePlanComponentsResponseBackups $backups;

    /**
     * @param array{
     *   compute?: ?DatabasePlanComponentsResponseCompute,
     *   storage?: ?DatabasePlanComponentsResponseStorage,
     *   backups?: ?DatabasePlanComponentsResponseBackups,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->compute = $values['compute'] ?? null;
        $this->storage = $values['storage'] ?? null;
        $this->backups = $values['backups'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
