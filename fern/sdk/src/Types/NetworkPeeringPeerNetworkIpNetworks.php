<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * note: only visible if both sides have a peering defined
 */
class NetworkPeeringPeerNetworkIpNetworks extends JsonSerializableType
{
    /**
     * @var ?array<NetworkPeeringPeerNetworkIpNetworksIpNetworkItem> $ipNetwork
     */
    #[JsonProperty('ip_network'), ArrayType([NetworkPeeringPeerNetworkIpNetworksIpNetworkItem::class])]
    public ?array $ipNetwork;

    /**
     * @param array{
     *   ipNetwork?: ?array<NetworkPeeringPeerNetworkIpNetworksIpNetworkItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ipNetwork = $values['ipNetwork'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
