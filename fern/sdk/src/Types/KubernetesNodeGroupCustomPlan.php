<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Node group custom plan properties
 */
class KubernetesNodeGroupCustomPlan extends JsonSerializableType
{
    /**
     * @var int $memory The amount of memory in megabytes to assign to individual node group node when using custom plan
     */
    #[JsonProperty('memory')]
    public int $memory;

    /**
     * @var int $cores The number of CPU cores dedicated to individual node group nodes when using custom plan
     */
    #[JsonProperty('cores')]
    public int $cores;

    /**
     * @var int $storageSize
     */
    #[JsonProperty('storage_size')]
    public int $storageSize;

    /**
     * @var ?value-of<KubernetesStorageTier> $storageTier
     */
    #[JsonProperty('storage_tier')]
    public ?string $storageTier;

    /**
     * @param array{
     *   memory: int,
     *   cores: int,
     *   storageSize: int,
     *   storageTier?: ?value-of<KubernetesStorageTier>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->memory = $values['memory'];
        $this->cores = $values['cores'];
        $this->storageSize = $values['storageSize'];
        $this->storageTier = $values['storageTier'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
