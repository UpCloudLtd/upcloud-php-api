<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Paid and debt credits on the account.
 */
class AccountCreditsBreakdownAccountCredits extends JsonSerializableType
{
    /**
     * @var float $debtCredits Outstanding debt credits.
     */
    #[JsonProperty('debt_credits')]
    public float $debtCredits;

    /**
     * @var float $maxDebt Maximum allowed debt.
     */
    #[JsonProperty('max_debt')]
    public float $maxDebt;

    /**
     * @var float $paidCredits Paid credits on the account.
     */
    #[JsonProperty('paid_credits')]
    public float $paidCredits;

    /**
     * @param array{
     *   debtCredits: float,
     *   maxDebt: float,
     *   paidCredits: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->debtCredits = $values['debtCredits'];
        $this->maxDebt = $values['maxDebt'];
        $this->paidCredits = $values['paidCredits'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
