<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerGpusGpusItem extends JsonSerializableType
{
    /**
     * @var ?string $firmware Firmware version of the GPU
     */
    #[JsonProperty('firmware')]
    public ?string $firmware;

    /**
     * @var ?string $serial Serial number of the GPU
     */
    #[JsonProperty('serial')]
    public ?string $serial;

    /**
     * @var ?string $part Part number of the GPU
     */
    #[JsonProperty('part')]
    public ?string $part;

    /**
     * @var string $model Model name of the GPU
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var ?int $memoryGib Memory size of the GPU in GiB
     */
    #[JsonProperty('memory_gib')]
    public ?int $memoryGib;

    /**
     * @var ?int $cores Number of processing cores in the GPU
     */
    #[JsonProperty('cores')]
    public ?int $cores;

    /**
     * @param array{
     *   model: string,
     *   firmware?: ?string,
     *   serial?: ?string,
     *   part?: ?string,
     *   memoryGib?: ?int,
     *   cores?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firmware = $values['firmware'] ?? null;
        $this->serial = $values['serial'] ?? null;
        $this->part = $values['part'] ?? null;
        $this->model = $values['model'];
        $this->memoryGib = $values['memoryGib'] ?? null;
        $this->cores = $values['cores'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
