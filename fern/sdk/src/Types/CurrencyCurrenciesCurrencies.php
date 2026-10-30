<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Wrapped collection of currency rate entries.
 */
class CurrencyCurrenciesCurrencies extends JsonSerializableType
{
    /**
     * @var array<CurrencyCurrenciesCurrenciesCurrencyItem> $currency List of supported currency rate entries.
     */
    #[JsonProperty('currency'), ArrayType([CurrencyCurrenciesCurrenciesCurrencyItem::class])]
    public array $currency;

    /**
     * @param array{
     *   currency: array<CurrencyCurrenciesCurrenciesCurrencyItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currency = $values['currency'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
