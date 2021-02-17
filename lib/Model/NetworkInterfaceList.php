<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class NetworkInterfaceList
{
    /**
     * @var NetworkInterfaces|null
     */
    private $interfaces;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setInterfaces($data['interfaces'] ?? null);
    }

    /**
     * @return NetworkInterfaces|null
     */
    public function getInterfaces(): ?NetworkInterfaces
    {
        return $this->interfaces;
    }

    /**
     * @param NetworkInterfaces|array|null $interfaces
     * @return NetworkInterfaceList
     */
    public function setInterfaces($interfaces): NetworkInterfaceList
    {
        if (is_array($interfaces)) {
            $this->interfaces = new NetworkInterfaces($interfaces);
        } else {
            $this->interfaces = $interfaces;
        }

        return $this;
    }
}
