<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerIpAddressesIpAddressItem extends JsonSerializableType
{
    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var value-of<ServerNetworkType> $access
     */
    #[JsonProperty('access')]
    public string $access;

    /**
     * @var value-of<ServerIpFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var ?string $prefix Network prefix length of the IP address
     */
    #[JsonProperty('prefix')]
    public ?string $prefix;

    /**
     * @param array{
     *   access: value-of<ServerNetworkType>,
     *   family: value-of<ServerIpFamily>,
     *   address?: ?string,
     *   prefix?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'] ?? null;
        $this->access = $values['access'];
        $this->family = $values['family'];
        $this->prefix = $values['prefix'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
