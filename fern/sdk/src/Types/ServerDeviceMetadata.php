<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

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
     * @param array{
     *   serial: string,
     *   memory: int,
     *   cores: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serial = $values['serial'];
        $this->memory = $values['memory'];
        $this->cores = $values['cores'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
