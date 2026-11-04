<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Internal passthrough device details for a host.
 */
class HostPassthroughDevices extends JsonSerializableType
{
    /**
     * @var array<HostDevice> $passthroughDevice Passthrough devices with privileged host details.
     */
    #[JsonProperty('passthrough_device'), ArrayType([HostDevice::class])]
    public array $passthroughDevice;

    /**
     * @param array{
     *   passthroughDevice: array<HostDevice>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->passthroughDevice = $values['passthroughDevice'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
