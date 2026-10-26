<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Passthrough devices requested for a new Cloud Server
 */
class ServerCreateDevices extends JsonSerializableType
{
    /**
     * @var array<ServerCreateDevicesDeviceItem> $device
     */
    #[JsonProperty('device'), ArrayType([ServerCreateDevicesDeviceItem::class])]
    public array $device;

    /**
     * @param array{
     *   device: array<ServerCreateDevicesDeviceItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->device = $values['device'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
