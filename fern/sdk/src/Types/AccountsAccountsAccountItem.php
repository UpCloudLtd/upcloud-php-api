<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountsAccountsAccountItem extends JsonSerializableType
{
    /**
     * @var value-of<AccountsAccountsAccountItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var AccountsAccountsAccountItemRoles $roles
     */
    #[JsonProperty('roles')]
    public AccountsAccountsAccountItemRoles $roles;

    /**
     * @var array<AccountLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([AccountLabel::class])]
    public array $labels;

    /**
     * @param array{
     *   type: value-of<AccountsAccountsAccountItemType>,
     *   username: string,
     *   roles: AccountsAccountsAccountItemRoles,
     *   labels: array<AccountLabel>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->username = $values['username'];
        $this->roles = $values['roles'];
        $this->labels = $values['labels'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
