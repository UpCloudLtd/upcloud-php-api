<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * List of network peerings the network is part of
 */
class NetworkDetailsPeerings extends JsonSerializableType
{
    /**
     * @var ?array<NetworkDetailsPeeringsPeeringItem> $peering
     */
    #[JsonProperty('peering'), ArrayType([NetworkDetailsPeeringsPeeringItem::class])]
    public ?array $peering;

    /**
     * @param array{
     *   peering?: ?array<NetworkDetailsPeeringsPeeringItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->peering = $values['peering'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
