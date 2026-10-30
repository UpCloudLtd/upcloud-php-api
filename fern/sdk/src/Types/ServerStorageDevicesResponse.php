<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Storage devices attached to a Cloud Server
 */
class ServerStorageDevicesResponse extends JsonSerializableType
{
    /**
     * @var array<ServerStorageDevicesResponseStorageDeviceItem> $storageDevice
     */
    #[JsonProperty('storage_device'), ArrayType([ServerStorageDevicesResponseStorageDeviceItem::class])]
    public array $storageDevice;

    /**
     * @param array{
     *   storageDevice: array<ServerStorageDevicesResponseStorageDeviceItem>,
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
