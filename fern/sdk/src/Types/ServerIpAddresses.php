<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * IP addresses assigned to the Cloud Server
 */
class ServerIpAddresses extends JsonSerializableType
{
    /**
     * @var array<ServerIpAddressesIpAddressItem> $ipAddress
     */
    #[JsonProperty('ip_address'), ArrayType([ServerIpAddressesIpAddressItem::class])]
    public array $ipAddress;

    /**
     * @param array{
     *   ipAddress: array<ServerIpAddressesIpAddressItem>,
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
