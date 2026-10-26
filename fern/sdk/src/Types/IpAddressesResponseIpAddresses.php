<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class IpAddressesResponseIpAddresses extends JsonSerializableType
{
    /**
     * @var array<IpAddressDetails> $ipAddress List of IP addresses
     */
    #[JsonProperty('ip_address'), ArrayType([IpAddressDetails::class])]
    public array $ipAddress;

    /**
     * @param array{
     *   ipAddress: array<IpAddressDetails>,
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
