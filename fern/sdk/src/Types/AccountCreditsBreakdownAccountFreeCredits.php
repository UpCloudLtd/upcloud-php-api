<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Free credits allocated to the account.
 */
class AccountCreditsBreakdownAccountFreeCredits extends JsonSerializableType
{
    /**
     * @var array<AccountCreditsBreakdownAccountFreeCreditsBreakdownItem> $breakdown List of individual free credit grants.
     */
    #[JsonProperty('breakdown'), ArrayType([AccountCreditsBreakdownAccountFreeCreditsBreakdownItem::class])]
    public array $breakdown;

    /**
     * @param array{
     *   breakdown: array<AccountCreditsBreakdownAccountFreeCreditsBreakdownItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->breakdown = $values['breakdown'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
