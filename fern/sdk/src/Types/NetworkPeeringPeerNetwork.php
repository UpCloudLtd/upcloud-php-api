<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Describes the peer side of the peering
 */
class NetworkPeeringPeerNetwork extends JsonSerializableType
{
    /**
     * @var ?NetworkPeeringPeerNetworkIpNetworks $ipNetworks note: only visible if both sides have a peering defined
     */
    #[JsonProperty('ip_networks')]
    public ?NetworkPeeringPeerNetworkIpNetworks $ipNetworks;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @param array{
     *   ipNetworks?: ?NetworkPeeringPeerNetworkIpNetworks,
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
