<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Request schema for IP address operations
 */
class IpAddressesResponse extends JsonSerializableType
{
    /**
     * @var IpAddressesResponseIpAddresses $ipAddresses
     */
    #[JsonProperty('ip_addresses')]
    public IpAddressesResponseIpAddresses $ipAddresses;

    /**
     * @param array{
     *   ipAddresses: IpAddressesResponseIpAddresses,
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
