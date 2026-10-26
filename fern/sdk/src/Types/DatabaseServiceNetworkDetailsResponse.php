<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for service network details response
 */
class DatabaseServiceNetworkDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createTime The creation time of the service network.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?DateTime $updateTime The last update time of the service network.
     */
    #[JsonProperty('update_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updateTime;

    /**
     * @var ?string $state The current state of the service network.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?array<DatabasePeeringStatusResponse> $networkPeerings
     */
    #[JsonProperty('network_peerings'), ArrayType([DatabasePeeringStatusResponse::class])]
    public ?array $networkPeerings;

    /**
     * @param array{
     *   createTime?: ?DateTime,
     *   updateTime?: ?DateTime,
     *   state?: ?string,
     *   networkPeerings?: ?array<DatabasePeeringStatusResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createTime = $values['createTime'] ?? null;
        $this->updateTime = $values['updateTime'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->networkPeerings = $values['networkPeerings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
