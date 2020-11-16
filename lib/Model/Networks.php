<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Networks
{
    /**
     * @var Network[]|null
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
     * @return Network[]|null
     */
    public function getNetwork(): ?array
    {
        return $this->network;
    }

    /**
     * @param Network[]|null $network
     * @return Networks
     */
    public function setNetwork(?array $network): Networks
    {
        if (is_array($network)) {
            foreach ($network as $item) {
                $this->network[] = $item instanceof Network
                ? $item
                : new Network($item);
            }
        } else {
            $this->network = $network;
        }

        return $this;
    }
}
