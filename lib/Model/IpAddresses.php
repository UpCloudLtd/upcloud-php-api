<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class IpAddresses
{
    /**
     * @var IpAddress[]|null
     */
    private $ipAddress;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setIpAddress($data['ip_address'] ?? null);
    }

    /**
     * @return IpAddress[]|null
     */
    public function getIpAddress(): ?array
    {
        return $this->ipAddress;
    }

    /**
     * @param IpAddress[]|null $ipAddress
     *
     * @return IpAddresses
     */
    public function setIpAddress(?array $ipAddress): IpAddresses
    {
        if (is_array($ipAddress)) {
            foreach ($ipAddress as $address) {
                $this->ipAddress[] = $address instanceof IpAddress
                        ? $address
                        : new IpAddress($address);
            }
        } else {
            $this->ipAddress = $ipAddress;
        }

        return $this;
    }


}


