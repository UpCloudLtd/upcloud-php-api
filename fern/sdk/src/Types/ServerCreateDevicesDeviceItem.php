<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerCreateDevicesDeviceItem extends JsonSerializableType
{
    /**
     * @var string $serial Serial identifier of the attached device
     */
    #[JsonProperty('serial')]
    public string $serial;

    /**
     * @var string $type Type of passthrough device to attach
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   serial: string,
     *   type: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serial = $values['serial'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
