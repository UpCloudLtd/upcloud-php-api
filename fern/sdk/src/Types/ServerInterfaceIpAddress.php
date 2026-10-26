<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network interface IP address
 */
class ServerInterfaceIpAddress extends JsonSerializableType
{
    /**
     * @var string $address
     */
    #[JsonProperty('address')]
    public string $address;

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
     * @var ?value-of<ServerBooleanYesno> $floating
     */
    #[JsonProperty('floating')]
    public ?string $floating;

    /**
     * @var ?value-of<ServerIpReleasePolicy> $releasePolicy
     */
    #[JsonProperty('release_policy')]
    public ?string $releasePolicy;

    /**
     * @param array{
     *   address: string,
     *   family: value-of<ServerIpFamily>,
     *   dhcpProvided?: ?value-of<ServerBooleanYesno>,
     *   floating?: ?value-of<ServerBooleanYesno>,
     *   releasePolicy?: ?value-of<ServerIpReleasePolicy>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->dhcpProvided = $values['dhcpProvided'] ?? null;
        $this->family = $values['family'];
        $this->floating = $values['floating'] ?? null;
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
