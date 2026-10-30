<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Request schema for IP address operations
 */
class IpAddressRequest extends JsonSerializableType
{
    /**
     * @var array<IpAddressDetails> $ipAddresses List of IP addresses to operate on
     */
    #[JsonProperty('ip_addresses'), ArrayType([IpAddressDetails::class])]
    public array $ipAddresses;

    /**
     * @param array{
     *   ipAddresses: array<IpAddressDetails>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddresses = $values['ipAddresses'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
