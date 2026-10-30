<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountsAccounts extends JsonSerializableType
{
    /**
     * @var array<AccountsAccountsAccountItem> $account
     */
    #[JsonProperty('account'), ArrayType([AccountsAccountsAccountItem::class])]
    public array $account;

    /**
     * @param array{
     *   account: array<AccountsAccountsAccountItem>,
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
