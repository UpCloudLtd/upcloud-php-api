<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem extends JsonSerializableType
{
    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?value-of<ServerBooleanYesno> $dhcpProvided
     */
    #[JsonProperty('dhcp_provided')]
    public ?string $dhcpProvided;

    /**
     * @var value-of<ServerIpFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @param array{
     *   family: value-of<ServerIpFamily>,
     *   address?: ?string,
     *   dhcpProvided?: ?value-of<ServerBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'] ?? null;
        $this->dhcpProvided = $values['dhcpProvided'] ?? null;
        $this->family = $values['family'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
