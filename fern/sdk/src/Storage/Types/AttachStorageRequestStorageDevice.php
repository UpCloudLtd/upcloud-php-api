<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Parameters for attaching this storage resource to a Cloud Server in the same zone.
 */
class AttachStorageRequestStorageDevice extends JsonSerializableType
{
    /**
     * @var string $server
     */
    #[JsonProperty('server')]
    public string $server;

    /**
     * @var ?string $address Device address on the Cloud Server, or an `ide`, `scsi`, or `virtio` bus name for automatic address selection. Defaults to the next available address on the Cloud Server's default disk bus for disks, or the IDE bus for CD-ROM devices.
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?value-of<AttachStorageRequestStorageDeviceType> $type Type of the attached device. Defaults to `disk`.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?value-of<AttachStorageRequestStorageDeviceBootDisk> $bootDisk Whether the device is used as the boot disk unless overridden by the Cloud Server boot order. Defaults to `0`.
     */
    #[JsonProperty('boot_disk')]
    public ?string $bootDisk;

    /**
     * @param array{
     *   server: string,
     *   address?: ?string,
     *   type?: ?value-of<AttachStorageRequestStorageDeviceType>,
     *   bootDisk?: ?value-of<AttachStorageRequestStorageDeviceBootDisk>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
        $this->address = $values['address'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->bootDisk = $values['bootDisk'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
