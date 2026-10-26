<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class GetMonthlyDetailedBillingSummaryRequest extends JsonSerializableType
{
    /**
     * @var ?string $username Return the billing summary for this account instead of the calling account. Requires Partner API access and an existing association with the account.
     */
    public ?string $username;

    /**
     * @var ?string $resourceId Return details only for this resource UUID or IP address.
     */
    public ?string $resourceId;

    /**
     * @param array{
     *   username?: ?string,
     *   resourceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->username = $values['username'] ?? null;
        $this->resourceId = $values['resourceId'] ?? null;
    }
}
