<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class NetworkInterfaces
{
    /**
     * @var NetworkInterface[]|null
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
     * @return NetworkInterface[]|null
     */
    public function getInterface(): ?array
    {
        return $this->interface;
    }

    /**
     * @param NetworkInterface[]|null $interface
     * @return NetworkInterfaces
     */
    public function setInterface(?array $interface): NetworkInterfaces
    {
        if (is_array($interface)) {
            foreach ($interface as $item) {
                $this->interface[] = new NetworkInterface($item);
            }
        } else {
            $this->interface = $interface;
        }

        return $this;
    }
}
