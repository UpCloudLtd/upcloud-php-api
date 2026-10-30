<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchDiskWatermarks extends JsonSerializableType
{
    /**
     * @var int $floodStage The flood stage watermark for disk usage.
     */
    #[JsonProperty('flood_stage')]
    public int $floodStage;

    /**
     * @var int $high The high watermark for disk usage.
     */
    #[JsonProperty('high')]
    public int $high;

    /**
     * @var int $low The low watermark for disk usage.
     */
    #[JsonProperty('low')]
    public int $low;

    /**
     * @param array{
     *   floodStage: int,
     *   high: int,
     *   low: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->floodStage = $values['floodStage'];
        $this->high = $values['high'];
        $this->low = $values['low'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
