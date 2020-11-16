<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class NetworksListResponse
{
    /**
     * @var Networks|null
     */
    private $networks;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setNetworks($data['networks'] ?? null);
    }

    /**
     * @return Networks|null
     */
    public function getNetworks(): ?Networks
    {
        return $this->networks;
    }

    /**
     * @param Networks|array|null $networks
     * @return NetworksListResponse
     */
    public function setNetworks($networks): NetworksListResponse
    {

        if (is_array($networks)) {
            $this->networks = new Networks($networks);
        } else {
            $this->networks = $networks;
        }

        return $this;
    }
}


