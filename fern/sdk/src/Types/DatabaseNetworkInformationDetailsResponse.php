<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for network information response details
 */
class DatabaseNetworkInformationDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid Unique identifier for the network
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name Name of the network
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<DatabaseNetworkInformationDetailsResponseFamily> $family Address family (e.g., IPv4, IPv6)
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?value-of<DatabaseNetworkInformationDetailsResponseType> $type Type of network (e.g., private, public)
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $createTime Timestamp when the network was created
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?DateTime $updateTime Timestamp when the network was last updated
     */
    #[JsonProperty('update_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updateTime;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   family?: ?value-of<DatabaseNetworkInformationDetailsResponseFamily>,
     *   type?: ?value-of<DatabaseNetworkInformationDetailsResponseType>,
     *   createTime?: ?DateTime,
     *   updateTime?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->updateTime = $values['updateTime'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
