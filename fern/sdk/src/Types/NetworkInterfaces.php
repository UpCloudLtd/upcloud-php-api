<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for listing network interfaces
 */
class NetworkInterfaces extends JsonSerializableType
{
    /**
     * @var NetworkInterfacesInterfaces $interfaces
     */
    #[JsonProperty('interfaces')]
    public NetworkInterfacesInterfaces $interfaces;

    /**
     * @param array{
     *   interfaces: NetworkInterfacesInterfaces,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interfaces = $values['interfaces'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
