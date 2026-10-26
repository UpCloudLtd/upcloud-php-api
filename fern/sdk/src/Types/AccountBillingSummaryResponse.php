<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response containing a monthly billing summary.
 */
class AccountBillingSummaryResponse extends JsonSerializableType
{
    /**
     * @var AccountBillingSummary $billing
     */
    #[JsonProperty('billing')]
    public AccountBillingSummary $billing;

    /**
     * @param array{
     *   billing: AccountBillingSummary,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->billing = $values['billing'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
