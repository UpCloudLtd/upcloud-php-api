<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class NetworkInterfaceResponse
{
    /**
     * @var NetworkInterface|null
     */
    private $interface;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setInterface($data['interface'] ?? null);
    }

    /**
     * @return NetworkInterface|null
     */
    public function getInterface(): ?array
    {
        return $this->interface;
    }

    /**
     * @param NetworkInterface|array|null $interface
     * @return NetworkInterfaceResponse
     */
    public function setInterface(?array $interface): NetworkInterfaceResponse
    {
        if (is_array($interface)) {
                $this->interface[] = new NetworkInterface($interface);
        } else {
            $this->interface = $interface;
        }

        return $this;
    }
}
