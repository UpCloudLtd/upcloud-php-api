<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Types\AccountUsageAccumulateParameter;

class GetAccountNetworkUsageRequest extends JsonSerializableType
{
    /**
     * @var DateTime $from First measurement timestamp in RFC 3339 format.
     */
    public DateTime $from;

    /**
     * @var DateTime $to Last measurement timestamp in RFC 3339 format.
     */
    public DateTime $to;

    /**
     * @var ?value-of<AccountUsageAccumulateParameter> $accumulate Accumulate the transfer statistics by hour or day.
     */
    public ?string $accumulate;

    /**
     * @param array{
     *   from: DateTime,
     *   to: DateTime,
     *   accumulate?: ?value-of<AccountUsageAccumulateParameter>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->accumulate = $values['accumulate'] ?? null;
    }
}
