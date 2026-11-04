<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Private network attachment through which clients access a File Storage service
 */
class FileStorageNetworkDetailResponse extends JsonSerializableType
{
    /**
     * @var value-of<FileStorageNetworkFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var string $ipAddress
     */
    #[JsonProperty('ip_address')]
    public string $ipAddress;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @param array{
     *   family: value-of<FileStorageNetworkFamily>,
     *   ipAddress: string,
     *   name: string,
     *   uuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->family = $values['family'];
        $this->ipAddress = $values['ipAddress'];
        $this->name = $values['name'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
