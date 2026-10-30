<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Node group cloud native plan properties
 */
class KubernetesNodeGroupCloudNativePlan extends JsonSerializableType
{
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
     *   storageSize: int,
     *   storageTier?: ?value-of<KubernetesStorageTier>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
