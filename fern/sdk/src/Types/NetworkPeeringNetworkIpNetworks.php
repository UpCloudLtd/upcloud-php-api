<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkPeeringNetworkIpNetworks extends JsonSerializableType
{
    /**
     * @var ?array<NetworkPeeringNetworkIpNetworksIpNetworkItem> $ipNetwork
     */
    #[JsonProperty('ip_network'), ArrayType([NetworkPeeringNetworkIpNetworksIpNetworkItem::class])]
    public ?array $ipNetwork;

    /**
     * @param array{
     *   ipNetwork?: ?array<NetworkPeeringNetworkIpNetworksIpNetworkItem>,
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
