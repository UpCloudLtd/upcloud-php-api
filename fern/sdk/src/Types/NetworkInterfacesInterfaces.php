<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class NetworkInterfacesInterfaces extends JsonSerializableType
{
    /**
     * @var NetworkInterface $interface
     */
    #[JsonProperty('interface')]
    public NetworkInterface $interface;

    /**
     * @param array{
     *   interface: NetworkInterface,
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
