<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class PriceListResponse
{
    /**
     * @var PriceListResponsePrices|null
     */
    private $prices;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setPrices($data['prices'] ?? null);
    }

    /**
     * @return PriceListResponsePrices|null
     */
    public function getPrices(): ?PriceListResponsePrices
    {
        return $this->prices;
    }

    /**
     * @param PriceListResponsePrices|array|null $prices
     * @return PriceListResponse
     */
    public function setPrices($prices): PriceListResponse
    {
        if (is_array($prices)) {
            $this->prices = new PriceListResponsePrices($prices);
        } else {
            $this->prices = $prices;
        }

        return $this;
    }
}


