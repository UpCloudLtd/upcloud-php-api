<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class IpNetworks
{
    /**
     * @var IpNetwork[]|null
     */
    private $ipNetwork;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setIpNetwork($data['ip_network'] ?? null);
    }

    /**
     * @return IpNetwork[]|null
     */
    public function getIpNetwork(): ?array
    {
        return $this->ipNetwork;
    }

    /**
     * @param IpNetwork[]|null $ipNetwork
     * @return IpNetworks
     */
    public function setIpNetwork(?array $ipNetwork): IpNetworks
    {
        if (is_array($ipNetwork)) {
            foreach ($ipNetwork as $item) {
                $this->ipNetwork[] = $item instanceof IpNetwork
                    ? $item
                    : new IpNetwork($item);
            }
        } else {
            $this->ipNetwork = $ipNetwork;
        }

        return $this;
    }
}
