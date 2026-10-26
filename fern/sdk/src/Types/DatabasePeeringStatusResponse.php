<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

/**
 * Schema for peering status response.
 */
class DatabasePeeringStatusResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createTime The time when the peering status was created.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?DateTime $updateTime The time when the peering status was last updated.
     */
    #[JsonProperty('update_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updateTime;

    /**
     * @var ?string $networkPeer The UUID of the network peer.
     */
    #[JsonProperty('network_peer')]
    public ?string $networkPeer;

    /**
     * @var ?string $state The current state of the peering connection.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $stateInfo Additional information about the current state of the peering connection.
     */
    #[JsonProperty('state_info')]
    public ?string $stateInfo;

    /**
     * @param array{
     *   createTime?: ?DateTime,
     *   updateTime?: ?DateTime,
     *   networkPeer?: ?string,
     *   state?: ?string,
     *   stateInfo?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createTime = $values['createTime'] ?? null;
        $this->updateTime = $values['updateTime'] ?? null;
        $this->networkPeer = $values['networkPeer'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->stateInfo = $values['stateInfo'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
