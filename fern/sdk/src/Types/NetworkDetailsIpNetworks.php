<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkDetailsIpNetworks extends JsonSerializableType
{
    /**
     * @var array<NetworkDetailsIpNetworksIpNetworkItem> $ipNetwork
     */
    #[JsonProperty('ip_network'), ArrayType([NetworkDetailsIpNetworksIpNetworkItem::class])]
    public array $ipNetwork;

    /**
     * @param array{
     *   ipNetwork: array<NetworkDetailsIpNetworksIpNetworkItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipNetwork = $values['ipNetwork'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
