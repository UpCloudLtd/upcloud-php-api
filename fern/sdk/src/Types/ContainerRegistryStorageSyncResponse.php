<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryStorageSyncResponse extends JsonSerializableType
{
    /**
     * @var int $storageUsedBytes Storage measured in the registry, in bytes.
     */
    #[JsonProperty('storage_used_bytes')]
    public int $storageUsedBytes;

    /**
     * @var float $storageUsedGb storage_used_bytes divided by 1024^3.
     */
    #[JsonProperty('storage_used_gb')]
    public float $storageUsedGb;

    /**
     * @param array{
     *   storageUsedBytes: int,
     *   storageUsedGb: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageUsedBytes = $values['storageUsedBytes'];
        $this->storageUsedGb = $values['storageUsedGb'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
