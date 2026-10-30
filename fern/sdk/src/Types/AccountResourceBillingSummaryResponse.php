<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response containing the monthly billing summary for a resource.
 */
class AccountResourceBillingSummaryResponse extends JsonSerializableType
{
    /**
     * @var AccountResourceBillingSummaryResponseBilling $billing
     */
    #[JsonProperty('billing')]
    public AccountResourceBillingSummaryResponseBilling $billing;

    /**
     * @param array{
     *   billing: AccountResourceBillingSummaryResponseBilling,
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
