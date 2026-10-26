<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerCreateNetworkingInterfaces extends JsonSerializableType
{
    /**
     * @var array<ServerCreateNetworkingInterfacesInterfaceItem> $interface
     */
    #[JsonProperty('interface'), ArrayType([ServerCreateNetworkingInterfacesInterfaceItem::class])]
    public array $interface;

    /**
     * @param array{
     *   interface: array<ServerCreateNetworkingInterfacesInterfaceItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interface = $values['interface'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
