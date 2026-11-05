<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\AccountProfile;
use Upcloud\Core\Json\JsonProperty;

class ModifyAccountProfileRequest extends JsonSerializableType
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
}
