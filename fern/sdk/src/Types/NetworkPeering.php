<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Network peering object describes a peering relationship between two networks
 */
class NetworkPeering extends JsonSerializableType
{
    /**
     * @var ?value-of<NetworkPeeringConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?NetworkPeeringNetwork $network Describes the local side of the peering
     */
    #[JsonProperty('network')]
    public ?NetworkPeeringNetwork $network;

    /**
     * @var ?NetworkPeeringPeerNetwork $peerNetwork Describes the peer side of the peering
     */
    #[JsonProperty('peer_network')]
    public ?NetworkPeeringPeerNetwork $peerNetwork;

    /**
     * @var ?value-of<NetworkPeeringState> $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?DateTime $createdAt When the network peering was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the network peering was last updated. Null until the first modification.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   configuredStatus?: ?value-of<NetworkPeeringConfiguredStatus>,
     *   name?: ?string,
     *   network?: ?NetworkPeeringNetwork,
     *   peerNetwork?: ?NetworkPeeringPeerNetwork,
     *   state?: ?value-of<NetworkPeeringState>,
     *   uuid?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->network = $values['network'] ?? null;
        $this->peerNetwork = $values['peerNetwork'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
