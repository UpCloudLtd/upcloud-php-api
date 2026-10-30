<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkIpFamily;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\NetworkBooleanYesno;
use Upcloud\Core\Types\ArrayType;

class CreateNetworkRequestNetworkIpNetworksIpNetworkItem extends JsonSerializableType
{
    /**
     * @var value-of<NetworkIpFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var string $address
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var ?string $gateway
     */
    #[JsonProperty('gateway')]
    public ?string $gateway;

    /**
     * @var value-of<NetworkBooleanYesno> $dhcp
     */
    #[JsonProperty('dhcp')]
    public string $dhcp;

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
     * @var ?string $dhcpBootfileUrl
     */
    #[JsonProperty('dhcp_bootfile_url')]
    public ?string $dhcpBootfileUrl;

    /**
     * @var ?CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfiguration $dhcpRoutesConfiguration
     */
    #[JsonProperty('dhcp_routes_configuration')]
    public ?CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfiguration $dhcpRoutesConfiguration;

    /**
     * @param array{
     *   family: value-of<NetworkIpFamily>,
     *   address: string,
     *   dhcp: value-of<NetworkBooleanYesno>,
     *   gateway?: ?string,
     *   dhcpDefaultRoute?: ?value-of<NetworkBooleanYesno>,
     *   dhcpDns?: ?array<string>,
     *   dhcpRoutes?: ?array<string>,
     *   dhcpBootfileUrl?: ?string,
     *   dhcpRoutesConfiguration?: ?CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfiguration,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->family = $values['family'];
        $this->address = $values['address'];
        $this->gateway = $values['gateway'] ?? null;
        $this->dhcp = $values['dhcp'];
        $this->dhcpDefaultRoute = $values['dhcpDefaultRoute'] ?? null;
        $this->dhcpDns = $values['dhcpDns'] ?? null;
        $this->dhcpRoutes = $values['dhcpRoutes'] ?? null;
        $this->dhcpBootfileUrl = $values['dhcpBootfileUrl'] ?? null;
        $this->dhcpRoutesConfiguration = $values['dhcpRoutesConfiguration'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
