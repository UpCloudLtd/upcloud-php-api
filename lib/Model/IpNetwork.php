<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class IpNetwork
{
    const FAMILY_IP_V4 = 'IPv4';
    const FAMILY_IP_V6 = 'IPv6';

    const DHCP_YES = 'yes';
    const DHCP_NO = 'no';

    const DHCP_DEFAULT_ROUTE_YES = 'yes';
    const DHCP_DEFAULT_ROUTE_NO = 'no';

    /**
     * @var string|null
     */
    private $family;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $dhcp;
    /**
     * @var string|null
     */
    private $dhcpDefaultRoute;
    /**
     * @var string[]|null
     */
    private $dhcpDns;

    /**
     * @var string|null
     */
    private $gateway;

    /**
     * @var string|null
     */
    private $dhcpBootfileUrl;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setFamily($data['family'] ?? null);
        $this->setAddress($data['address'] ?? null);
        $this->setDhcp($data['dhcp'] ?? null);
        $this->setDhcpDefaultRoute($data['dhcp_default_route'] ?? null);
        $this->setDhcpDns($data['dhcp_dns'] ?? null);
        $this->setGateway($data['gateway'] ?? null);
        $this->setDhcpBootfileUrl($data['dhcp_bootfile_url'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getFamily(): ?string
    {
        return $this->family;
    }

    /**
     * @param string|null $family
     * @return IpNetwork
     */
    public function setFamily(?string $family): IpNetwork
    {
        if (!is_null($family)) {
            Assert::oneOf($family, [
                self::FAMILY_IP_V4,
                self::FAMILY_IP_V6,
            ]);
        }

        $this->family = $family;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     *
     * @return IpNetwork
     */
    public function setAddress(?string $address): IpNetwork
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDhcp(): ?string
    {
        return $this->dhcp;
    }

    /**
     * @param string|null $dhcp
     * @return IpNetwork
     */
    public function setDhcp(?string $dhcp): IpNetwork
    {
        if (!is_null($dhcp)) {
            Assert::oneOf($dhcp, [
                self::DHCP_NO,
                self::DHCP_YES,
            ]);
        }

        $this->dhcp = $dhcp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDhcpDefaultRoute(): ?string
    {
        return $this->dhcpDefaultRoute;
    }

    /**
     * @param string|null $dhcpDefaultRoute
     * @return IpNetwork
     */
    public function setDhcpDefaultRoute(?string $dhcpDefaultRoute): IpNetwork
    {
        if (!is_null($dhcpDefaultRoute)) {
            Assert::oneOf($dhcpDefaultRoute, [
                self::DHCP_DEFAULT_ROUTE_NO,
                self::DHCP_DEFAULT_ROUTE_YES,
            ]);
        }

        $this->dhcpDefaultRoute = $dhcpDefaultRoute;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getDhcpDns(): ?array
    {
        return $this->dhcpDns;
    }

    /**
     * @param string[]|null $dhcpDns
     * @return IpNetwork
     */
    public function setDhcpDns(?array $dhcpDns): IpNetwork
    {
        $this->dhcpDns = $dhcpDns;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGateway(): ?string
    {
        return $this->gateway;
    }

    /**
     * @param string|null $gateway
     * @return IpNetwork
     */
    public function setGateway(?string $gateway): IpNetwork
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDhcpBootfileUrl(): ?string
    {
        return $this->dhcpBootfileUrl;
    }

    /**
     * @param string|null $dhcpBootfileUrl
     * @return IpNetwork
     */
    public function setDhcpBootfileUrl(?string $dhcpBootfileUrl): IpNetwork
    {
        $this->dhcpBootfileUrl = $dhcpBootfileUrl;

        return $this;
    }
}
