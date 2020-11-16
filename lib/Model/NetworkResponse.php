<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class NetworkResponse
{
    /**
     * @var Network|null
     */
    private $network;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setNetwork($data['network'] ?? null);
    }

    /**
     * @return Network|null
     */
    public function getNetwork(): ?Network
    {
        return $this->network;
    }

    /**
     * @param Network|array|null $network
     * @return NetworkResponse
     */
    public function setNetwork($network): NetworkResponse
    {
        if (is_array($network)) {
            $this->network = new Network($network);
        } else {
            $this->network = $network;
        }

        return $this;
    }

}


