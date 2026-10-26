<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerDetailsDevices extends JsonSerializableType
{
    /**
     * @var array<ServerDevice> $device
     */
    #[JsonProperty('device'), ArrayType([ServerDevice::class])]
    public array $device;

    /**
     * @param array{
     *   device: array<ServerDevice>,
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
