<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerCreateNetworkingInterfacesInterfaceItemIpAddresses extends JsonSerializableType
{
    /**
     * @var array<ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem> $ipAddress
     */
    #[JsonProperty('ip_address'), ArrayType([ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem::class])]
    public array $ipAddress;

    /**
     * @param array{
     *   ipAddress: array<ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddress = $values['ipAddress'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
