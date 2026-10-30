<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Monthly billing totals grouped by resource type and subtype.
 */
class AccountBillingSummary extends JsonSerializableType
{
    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?float $totalAmount
     */
    #[JsonProperty('total_amount')]
    public ?float $totalAmount;

    /**
     * @param array{
     *   currency?: ?string,
     *   totalAmount?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currency = $values['currency'] ?? null;
        $this->totalAmount = $values['totalAmount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
