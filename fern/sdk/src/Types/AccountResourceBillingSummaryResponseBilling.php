<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountResourceBillingSummaryResponseBilling extends JsonSerializableType
{
    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?array<string, float> $dailySums
     */
    #[JsonProperty('daily_sums'), ArrayType(['string' => 'float'])]
    public ?array $dailySums;

    /**
     * @var ?array<string, mixed> $details
     */
    #[JsonProperty('details'), ArrayType(['string' => 'mixed'])]
    public ?array $details;

    /**
     * @var ?float $totalAmount
     */
    #[JsonProperty('total_amount')]
    public ?float $totalAmount;

    /**
     * @param array{
     *   currency?: ?string,
     *   dailySums?: ?array<string, float>,
     *   details?: ?array<string, mixed>,
     *   totalAmount?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currency = $values['currency'] ?? null;
        $this->dailySums = $values['dailySums'] ?? null;
        $this->details = $values['details'] ?? null;
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
