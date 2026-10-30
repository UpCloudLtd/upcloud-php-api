<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for zone VLANs
 */
class ZoneVlans extends JsonSerializableType
{
    /**
     * @var ZoneVlansZoneVlans $zoneVlans
     */
    #[JsonProperty('zone_vlans')]
    public ZoneVlansZoneVlans $zoneVlans;

    /**
     * @param array{
     *   zoneVlans: ZoneVlansZoneVlans,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->zoneVlans = $values['zoneVlans'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
