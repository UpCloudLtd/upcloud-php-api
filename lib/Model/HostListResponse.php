<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class HostListResponse
{
    /**
     * @var Hosts|null
     */
    private $hosts;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setHosts($data['hosts'] ?? null);
    }

    /**
     * @return Hosts|null
     */
    public function getHosts(): ?Hosts
    {
        return $this->hosts;
    }

    /**
     * @param Hosts|array|null $hosts
     * @return HostListResponse
     */
    public function setHosts($hosts): HostListResponse
    {
        if (is_array($hosts)) {
            $this->hosts = new Hosts($hosts);
        } else {
            $this->hosts = $hosts;
        }

        return $this;
    }
}
