<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network peerings
 */
class NetworkPeerings extends JsonSerializableType
{
    /**
     * @var NetworkPeeringsNetworkPeerings $networkPeerings
     */
    #[JsonProperty('network_peerings')]
    public NetworkPeeringsNetworkPeerings $networkPeerings;

    /**
     * @param array{
     *   networkPeerings: NetworkPeeringsNetworkPeerings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->networkPeerings = $values['networkPeerings'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
