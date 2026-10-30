<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Types\ServerIpFamily;
use Upcloud\Types\ServerIpReleasePolicy;

class ServerAddInterfaceInterfaceIpAddressesIpAddressItem extends JsonSerializableType
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
     * @var ?value-of<ServerIpReleasePolicy> $releasePolicy
     */
    #[JsonProperty('release_policy')]
    public ?string $releasePolicy;

    /**
     * @param array{
     *   family: value-of<ServerIpFamily>,
     *   address?: ?string,
     *   dhcpProvided?: ?value-of<ServerBooleanYesno>,
     *   releasePolicy?: ?value-of<ServerIpReleasePolicy>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'] ?? null;
        $this->dhcpProvided = $values['dhcpProvided'] ?? null;
        $this->family = $values['family'];
        $this->releasePolicy = $values['releasePolicy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
