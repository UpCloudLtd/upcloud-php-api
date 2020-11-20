<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class PriceListResponsePrices
{
    /**
     * @var PriceZone[]|null
     */
    private $zone;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setZone($data['zone'] ?? null);
    }

    /**
     * @return PriceZone[]|null
     */
    public function getZone(): ?array
    {
        return $this->zone;
    }

    /**
     * @param PriceZone[]|null $zone
     * @return PriceListResponsePrices
     */
    public function setZone(?array $zone): PriceListResponsePrices
    {
        if (is_array($zone)) {
            foreach ($zone as $item) {
                $this->zone[] = $item instanceof PriceZone
                ? $item
                : new PriceZone($item);
            }
        } else {
            $this->zone = $zone;
        }

        return $this;
    }
}


