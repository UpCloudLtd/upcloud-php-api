<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Detailed breakdown of account credits.
 */
class AccountCreditsBreakdown extends JsonSerializableType
{
    /**
     * @var AccountCreditsBreakdownAccountCredits $accountCredits Paid and debt credits on the account.
     */
    #[JsonProperty('account_credits')]
    public AccountCreditsBreakdownAccountCredits $accountCredits;

    /**
     * @var AccountCreditsBreakdownAccountFreeCredits $accountFreeCredits Free credits allocated to the account.
     */
    #[JsonProperty('account_free_credits')]
    public AccountCreditsBreakdownAccountFreeCredits $accountFreeCredits;

    /**
     * @var float $totalCredits Total combined credit balance.
     */
    #[JsonProperty('total_credits')]
    public float $totalCredits;

    /**
     * @param array{
     *   accountCredits: AccountCreditsBreakdownAccountCredits,
     *   accountFreeCredits: AccountCreditsBreakdownAccountFreeCredits,
     *   totalCredits: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountCredits = $values['accountCredits'];
        $this->accountFreeCredits = $values['accountFreeCredits'];
        $this->totalCredits = $values['totalCredits'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
