<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema containing account details.
 */
class Account extends JsonSerializableType
{
    /**
     * @var AccountDetails $account
     */
    #[JsonProperty('account')]
    public AccountDetails $account;

    /**
     * @param array{
     *   account: AccountDetails,
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
