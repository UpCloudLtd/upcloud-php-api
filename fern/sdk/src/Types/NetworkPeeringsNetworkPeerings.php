<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkPeeringsNetworkPeerings extends JsonSerializableType
{
    /**
     * @var array<NetworkPeering> $networkPeering
     */
    #[JsonProperty('network_peering'), ArrayType([NetworkPeering::class])]
    public array $networkPeering;

    /**
     * @param array{
     *   networkPeering: array<NetworkPeering>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->networkPeering = $values['networkPeering'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
