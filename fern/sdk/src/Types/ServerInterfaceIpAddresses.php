<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * IP addresses attached to the interface
 */
class ServerInterfaceIpAddresses extends JsonSerializableType
{
    /**
     * @var array<ServerInterfaceIpAddress> $ipAddress
     */
    #[JsonProperty('ip_address'), ArrayType([ServerInterfaceIpAddress::class])]
    public array $ipAddress;

    /**
     * @param array{
     *   ipAddress: array<ServerInterfaceIpAddress>,
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
