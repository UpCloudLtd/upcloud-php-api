<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Passthrough devices available to a private cloud user.
 */
class HostDevices extends JsonSerializableType
{
    /**
     * @var array<HostDevice> $device Passthrough devices available on the host.
     */
    #[JsonProperty('device'), ArrayType([HostDevice::class])]
    public array $device;

    /**
     * @param array{
     *   device: array<HostDevice>,
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
