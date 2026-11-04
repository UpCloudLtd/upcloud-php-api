<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Private network attachment to create for a File Storage service. A service can have at most one attachment. Its name must be unique within the service, and the selected network must be an accessible private network in the service zone. Only IPv4 is supported.
 */
class FileStorageNetworkCreate extends JsonSerializableType
{
    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<FileStorageNetworkFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var ?string $ipAddress
     */
    #[JsonProperty('ip_address')]
    public ?string $ipAddress;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   family: value-of<FileStorageNetworkFamily>,
     *   ipAddress?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->family = $values['family'];
        $this->ipAddress = $values['ipAddress'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
