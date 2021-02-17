<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerNetworksListResponse
{
    /**
     * @var NetworkInterfaceList|null
     */
    private $networking;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setNetworking($data['networking'] ?? null);
    }

    /**
     * @return NetworkInterfaceList|null
     */
    public function getNetworking(): ?NetworkInterfaceList
    {
        return $this->networking;
    }

    /**
     * @param NetworkInterfaceList|array|null $networking
     * @return ServerNetworksListResponse
     */
    public function setNetworking($networking): ServerNetworksListResponse
    {
        if (is_array($networking)) {
            $this->networking = new NetworkInterfaceList($networking);
        } else {
            $this->networking = $networking;
        }

        return $this;
    }
}


