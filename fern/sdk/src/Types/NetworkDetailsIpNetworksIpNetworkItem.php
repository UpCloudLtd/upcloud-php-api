<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkDetailsIpNetworksIpNetworkItem extends JsonSerializableType
{
    /**
     * @var string $address
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var ?value-of<NetworkBooleanYesno> $dhcp
     */
    #[JsonProperty('dhcp')]
    public ?string $dhcp;

    /**
     * @var ?string $dhcpBootfileUrl
     */
    #[JsonProperty('dhcp_bootfile_url')]
    public ?string $dhcpBootfileUrl;

    /**
     * @var ?value-of<NetworkBooleanYesno> $dhcpDefaultRoute
     */
    #[JsonProperty('dhcp_default_route')]
    public ?string $dhcpDefaultRoute;

    /**
     * @var ?array<string> $dhcpDns
     */
    #[JsonProperty('dhcp_dns'), ArrayType(['string'])]
    public ?array $dhcpDns;

    /**
     * @var ?array<string> $dhcpRoutes
     */
    #[JsonProperty('dhcp_routes'), ArrayType(['string'])]
    public ?array $dhcpRoutes;

    /**
     * @var value-of<NetworkIpFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var ?string $gateway
     */
    #[JsonProperty('gateway')]
    public ?string $gateway;

    /**
     * @param array{
     *   address: string,
     *   family: value-of<NetworkIpFamily>,
     *   dhcp?: ?value-of<NetworkBooleanYesno>,
     *   dhcpBootfileUrl?: ?string,
     *   dhcpDefaultRoute?: ?value-of<NetworkBooleanYesno>,
     *   dhcpDns?: ?array<string>,
     *   dhcpRoutes?: ?array<string>,
     *   gateway?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->dhcp = $values['dhcp'] ?? null;
        $this->dhcpBootfileUrl = $values['dhcpBootfileUrl'] ?? null;
        $this->dhcpDefaultRoute = $values['dhcpDefaultRoute'] ?? null;
        $this->dhcpDns = $values['dhcpDns'] ?? null;
        $this->dhcpRoutes = $values['dhcpRoutes'] ?? null;
        $this->family = $values['family'];
        $this->gateway = $values['gateway'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
