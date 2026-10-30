<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Zones schema
 */
class Zones extends JsonSerializableType
{
    /**
     * @var ZonesZones $zones
     */
    #[JsonProperty('zones')]
    public ZonesZones $zones;

    /**
     * @param array{
     *   zones: ZonesZones,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->zones = $values['zones'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
