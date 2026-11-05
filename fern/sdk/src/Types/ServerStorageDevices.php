<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;

/**
 * Storage devices to create or attach to the Cloud Server
 */
class ServerStorageDevices extends JsonSerializableType
{
    /**
     * @var array<(
     *    ServerStorageDevicesStorageDeviceItemZero
     *   |ServerStorageDevicesStorageDeviceItemOne
     *   |ServerStorageDevicesStorageDeviceItemActionType
     *   |ServerStorageDevicesStorageDeviceItemActionStorage
     * )> $storageDevice
     */
    #[JsonProperty('storage_device'), ArrayType([new Union(ServerStorageDevicesStorageDeviceItemZero::class, ServerStorageDevicesStorageDeviceItemOne::class, ServerStorageDevicesStorageDeviceItemActionType::class, ServerStorageDevicesStorageDeviceItemActionStorage::class)])]
    public array $storageDevice;

    /**
     * @param array{
     *   storageDevice: array<(
     *    ServerStorageDevicesStorageDeviceItemZero
     *   |ServerStorageDevicesStorageDeviceItemOne
     *   |ServerStorageDevicesStorageDeviceItemActionType
     *   |ServerStorageDevicesStorageDeviceItemActionStorage
     * )>,
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
