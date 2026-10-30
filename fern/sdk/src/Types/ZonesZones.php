<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ZonesZones extends JsonSerializableType
{
    /**
     * @var array<ZonesZonesZoneItem> $zone
     */
    #[JsonProperty('zone'), ArrayType([ZonesZonesZoneItem::class])]
    public array $zone;

    /**
     * @param array{
     *   zone: array<ZonesZonesZoneItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->zone = $values['zone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
