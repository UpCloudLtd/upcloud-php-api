<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Storage device to attach.
 */
class ServerAttachStorageStorageDevice extends JsonSerializableType
{
    /**
     * @var ?string $address Device address or bus. When only a bus is specified, the next available address on that bus is selected. Defaults to the next available virtio address for disks and IDE address for CD-ROM devices.
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?int $bootDisk Whether to use this storage device as the boot disk. The Cloud Server boot_order setting takes precedence.
     */
    #[JsonProperty('boot_disk')]
    public ?int $bootDisk;

    /**
     * @var ?string $storage
     */
    #[JsonProperty('storage')]
    public ?string $storage;

    /**
     * @var ?value-of<ServerAttachStorageStorageDeviceType> $type Type of device to attach.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   address?: ?string,
     *   bootDisk?: ?int,
     *   storage?: ?string,
     *   type?: ?value-of<ServerAttachStorageStorageDeviceType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address = $values['address'] ?? null;
        $this->bootDisk = $values['bootDisk'] ?? null;
        $this->storage = $values['storage'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
