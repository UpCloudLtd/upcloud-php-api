<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * IP addresses to attach to the interface
 */
class ServerAddInterfaceInterfaceIpAddresses extends JsonSerializableType
{
    /**
     * @var array<ServerAddInterfaceInterfaceIpAddressesIpAddressItem> $ipAddress
     */
    #[JsonProperty('ip_address'), ArrayType([ServerAddInterfaceInterfaceIpAddressesIpAddressItem::class])]
    public array $ipAddress;

    /**
     * @param array{
     *   ipAddress: array<ServerAddInterfaceInterfaceIpAddressesIpAddressItem>,
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
