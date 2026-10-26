<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for listing supported currencies and exchange rates.
 */
class CurrencyCurrencies extends JsonSerializableType
{
    /**
     * @var CurrencyCurrenciesCurrencies $currencies Wrapped collection of currency rate entries.
     */
    #[JsonProperty('currencies')]
    public CurrencyCurrenciesCurrencies $currencies;

    /**
     * @param array{
     *   currencies: CurrencyCurrenciesCurrencies,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currencies = $values['currencies'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
