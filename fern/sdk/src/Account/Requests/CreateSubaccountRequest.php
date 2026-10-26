<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Account\Types\CreateSubaccountRequestSubAccount;
use Upcloud\Core\Json\JsonProperty;

class CreateSubaccountRequest extends JsonSerializableType
{
    /**
     * @var CreateSubaccountRequestSubAccount $subAccount
     */
    #[JsonProperty('sub_account')]
    public CreateSubaccountRequestSubAccount $subAccount;

    /**
     * @param array{
     *   subAccount: CreateSubaccountRequestSubAccount,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subAccount = $values['subAccount'];
    }
}
