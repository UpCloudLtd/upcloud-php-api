<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for the detailed response of a network.
 */
class FileStorageNetworkDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $family
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?string $ipAddress
     */
    #[JsonProperty('ip_address')]
    public ?string $ipAddress;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @param array{
     *   family?: ?string,
     *   ipAddress?: ?string,
     *   name?: ?string,
     *   uuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->family = $values['family'] ?? null;
        $this->ipAddress = $values['ipAddress'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
