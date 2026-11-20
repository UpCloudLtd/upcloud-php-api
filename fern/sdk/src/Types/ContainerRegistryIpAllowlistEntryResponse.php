<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryIpAllowlistEntryResponse extends JsonSerializableType
{
    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $cidr CIDR block that is allowed
     */
    #[JsonProperty('cidr')]
    public string $cidr;

    /**
     * @var ?string $description Human-readable description of the allowlist entry
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var DateTime $createdAt Timestamp when the entry was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?string $createdBy Identifier of the user who created the entry
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @param array{
     *   uuid: string,
     *   cidr: string,
     *   createdAt: DateTime,
     *   description?: ?string,
     *   createdBy?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->cidr = $values['cidr'];
        $this->description = $values['description'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->createdBy = $values['createdBy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
