<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Complete replacement list of IP addresses for the interface
 */
class ServerModifyInterfaceInterfaceIpAddresses extends JsonSerializableType
{
    /**
     * @var array<ServerModifyInterfaceInterfaceIpAddressesIpAddressItem> $ipAddress
     */
    #[JsonProperty('ip_address'), ArrayType([ServerModifyInterfaceInterfaceIpAddressesIpAddressItem::class])]
    public array $ipAddress;

    /**
     * @param array{
     *   ipAddress: array<ServerModifyInterfaceInterfaceIpAddressesIpAddressItem>,
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
