<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class IpAddressListResponse
{
    /**
     * @var IpAddresses|null
     */
    private $ipAddresses;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setIpAddresses($data['ip_addresses'] ?? null);
    }

    /**
     * @return IpAddresses|null
     */
    public function getIpAddresses(): ?IpAddresses
    {
        return $this->ipAddresses;
    }

    /**
     * @param IpAddresses|array|null $ipAddresses
     *
     * @return IpAddressListResponse
     */
    public function setIpAddresses($ipAddresses): IpAddressListResponse
    {
        if (is_array($ipAddresses)) {
            $this->ipAddresses = new IpAddresses($ipAddresses);
        } else {
            $this->ipAddresses = $ipAddresses;
        }

        return $this;
    }
}


