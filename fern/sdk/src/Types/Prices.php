<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Price list for UpCloud resources and services.
 */
class Prices extends JsonSerializableType
{
    /**
     * @var PricesPrices $prices
     */
    #[JsonProperty('prices')]
    public PricesPrices $prices;

    /**
     * @param array{
     *   prices: PricesPrices,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->prices = $values['prices'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
