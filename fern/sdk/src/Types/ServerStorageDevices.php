<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Storage devices to create or attach to the Cloud Server
 */
class ServerStorageDevices extends JsonSerializableType
{
    /**
     * @var array<ServerStorageDevicesStorageDeviceItem> $storageDevice
     */
    #[JsonProperty('storage_device'), ArrayType([ServerStorageDevicesStorageDeviceItem::class])]
    public array $storageDevice;

    /**
     * @param array{
     *   storageDevice: array<ServerStorageDevicesStorageDeviceItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageDevice = $values['storageDevice'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
