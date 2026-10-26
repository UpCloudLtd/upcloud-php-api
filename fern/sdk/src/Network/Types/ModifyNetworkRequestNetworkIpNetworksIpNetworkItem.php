<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkIpFamily;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ModifyNetworkRequestNetworkIpNetworksIpNetworkItem extends JsonSerializableType
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
     * @var ?string $dhcp
     */
    #[JsonProperty('dhcp')]
    public ?string $dhcp;

    /**
     * @var ?string $dhcpDefaultRoute
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
     * @param array{
     *   family: value-of<NetworkIpFamily>,
     *   address: string,
     *   gateway?: ?string,
     *   dhcp?: ?string,
     *   dhcpDefaultRoute?: ?string,
     *   dhcpDns?: ?array<string>,
     *   dhcpRoutes?: ?array<string>,
     *   dhcpBootfileUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->family = $values['family'];
        $this->address = $values['address'];
        $this->gateway = $values['gateway'] ?? null;
        $this->dhcp = $values['dhcp'] ?? null;
        $this->dhcpDefaultRoute = $values['dhcpDefaultRoute'] ?? null;
        $this->dhcpDns = $values['dhcpDns'] ?? null;
        $this->dhcpRoutes = $values['dhcpRoutes'] ?? null;
        $this->dhcpBootfileUrl = $values['dhcpBootfileUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
