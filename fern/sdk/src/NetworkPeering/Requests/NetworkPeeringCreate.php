<?php

namespace Upcloud\NetworkPeering\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\NetworkPeering\Types\NetworkPeeringCreateConfiguredStatus;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\NetworkPeering\Types\NetworkPeeringCreateNetwork;
use Upcloud\NetworkPeering\Types\NetworkPeeringCreatePeerNetwork;

class NetworkPeeringCreate extends JsonSerializableType
{
    /**
     * @var ?value-of<NetworkPeeringCreateConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var NetworkPeeringCreateNetwork $network Describes the local side of the peering
     */
    #[JsonProperty('network')]
    public NetworkPeeringCreateNetwork $network;

    /**
     * @var NetworkPeeringCreatePeerNetwork $peerNetwork Describes the peer side of the peering
     */
    #[JsonProperty('peer_network')]
    public NetworkPeeringCreatePeerNetwork $peerNetwork;

    /**
     * @param array{
     *   name: string,
     *   network: NetworkPeeringCreateNetwork,
     *   peerNetwork: NetworkPeeringCreatePeerNetwork,
     *   configuredStatus?: ?value-of<NetworkPeeringCreateConfiguredStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->name = $values['name'];
        $this->network = $values['network'];
        $this->peerNetwork = $values['peerNetwork'];
    }
}
