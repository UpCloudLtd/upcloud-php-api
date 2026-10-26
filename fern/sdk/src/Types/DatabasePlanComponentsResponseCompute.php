<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Compute resources per service
 */
class DatabasePlanComponentsResponseCompute extends JsonSerializableType
{
    /**
     * @var ?string $name Compute shape name usable as plan_compute in requests.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<DatabasePlanComponentsResponseComputeFamily> $family Compute family for tiered plans. Omitted for classic plans.
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?int $nodeCount Number of nodes
     */
    #[JsonProperty('node_count')]
    public ?int $nodeCount;

    /**
     * @var ?int $cpu CPU cores per node
     */
    #[JsonProperty('cpu')]
    public ?int $cpu;

    /**
     * @var ?int $memoryGb Memory per node in GB
     */
    #[JsonProperty('memory_gb')]
    public ?int $memoryGb;

    /**
     * @param array{
     *   name?: ?string,
     *   family?: ?value-of<DatabasePlanComponentsResponseComputeFamily>,
     *   nodeCount?: ?int,
     *   cpu?: ?int,
     *   memoryGb?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->nodeCount = $values['nodeCount'] ?? null;
        $this->cpu = $values['cpu'] ?? null;
        $this->memoryGb = $values['memoryGb'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
