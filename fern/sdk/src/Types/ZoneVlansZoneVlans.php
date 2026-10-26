<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ZoneVlansZoneVlans extends JsonSerializableType
{
    /**
     * @var array<ZoneVlansZoneVlansVlanItem> $vlan
     */
    #[JsonProperty('vlan'), ArrayType([ZoneVlansZoneVlansVlanItem::class])]
    public array $vlan;

    /**
     * @param array{
     *   vlan: array<ZoneVlansZoneVlansVlanItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->vlan = $values['vlan'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
