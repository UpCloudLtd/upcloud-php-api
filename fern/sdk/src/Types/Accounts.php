<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Main account and subaccounts accessible to the authenticated account.
 */
class Accounts extends JsonSerializableType
{
    /**
     * @var AccountsAccounts $accounts
     */
    #[JsonProperty('accounts')]
    public AccountsAccounts $accounts;

    /**
     * @param array{
     *   accounts: AccountsAccounts,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accounts = $values['accounts'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
