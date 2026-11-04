<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Profile details for a main account or subaccount.
 */
class AccountProfileResponse extends JsonSerializableType
{
    /**
     * @var AccountProfile $account
     */
    #[JsonProperty('account')]
    public AccountProfile $account;

    /**
     * @param array{
     *   account: AccountProfile,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->account = $values['account'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
