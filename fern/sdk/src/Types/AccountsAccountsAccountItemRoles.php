<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountsAccountsAccountItemRoles extends JsonSerializableType
{
    /**
     * @var array<string> $role
     */
    #[JsonProperty('role'), ArrayType(['string'])]
    public array $role;

    /**
     * @param array{
     *   role: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
