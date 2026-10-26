<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Describes the local side of the peering
 */
class NetworkPeeringNetwork extends JsonSerializableType
{
    /**
     * @var ?NetworkPeeringNetworkIpNetworks $ipNetworks
     */
    #[JsonProperty('ip_networks')]
    public ?NetworkPeeringNetworkIpNetworks $ipNetworks;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @param array{
     *   ipNetworks?: ?NetworkPeeringNetworkIpNetworks,
     *   uuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ipNetworks = $values['ipNetworks'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
