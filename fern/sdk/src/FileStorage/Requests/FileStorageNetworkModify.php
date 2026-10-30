<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStorageNetworkFamily;

class FileStorageNetworkModify extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<FileStorageNetworkFamily> $family
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?string $ipAddress
     */
    #[JsonProperty('ip_address')]
    public ?string $ipAddress;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   family?: ?value-of<FileStorageNetworkFamily>,
     *   ipAddress?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->ipAddress = $values['ipAddress'] ?? null;
    }
}
