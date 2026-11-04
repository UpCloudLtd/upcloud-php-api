<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerDeviceMetadata extends JsonSerializableType
{
    /**
     * @var string $serial
     */
    #[JsonProperty('serial')]
    public string $serial;

    /**
     * @var int $memory
     */
    #[JsonProperty('memory')]
    public int $memory;

    /**
     * @var int $cores
     */
    #[JsonProperty('cores')]
    public int $cores;

    /**
     * @var ?array<int> $partitionIds Identifiers of the hardware partitions containing the device.
     */
    #[JsonProperty('partition_ids'), ArrayType(['integer'])]
    public ?array $partitionIds;

    /**
     * @param array{
     *   serial: string,
     *   memory: int,
     *   cores: int,
     *   partitionIds?: ?array<int>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serial = $values['serial'];
        $this->memory = $values['memory'];
        $this->cores = $values['cores'];
        $this->partitionIds = $values['partitionIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
