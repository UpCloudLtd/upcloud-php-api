<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Types\AccountResourceNetworkUsageType;
use Upcloud\Types\AccountUsageAccumulateParameter;

class GetAccountNetworkTopUsageRequest extends JsonSerializableType
{
    /**
     * @var DateTime $from Start of the usage period.
     */
    public DateTime $from;

    /**
     * @var DateTime $to End of the usage period.
     */
    public DateTime $to;

    /**
     * @var ?value-of<AccountResourceNetworkUsageType> $service Filter by service type. Repeat the parameter to include multiple service types.
     */
    public ?string $service;

    /**
     * @var ?string $zone Filter by zone. Repeat the parameter to include multiple zones.
     */
    public ?string $zone;

    /**
     * @var ?value-of<AccountUsageAccumulateParameter> $accumulate Accumulation period for the usage statistics.
     */
    public ?string $accumulate;

    /**
     * @param array{
     *   from: DateTime,
     *   to: DateTime,
     *   service?: ?value-of<AccountResourceNetworkUsageType>,
     *   zone?: ?string,
     *   accumulate?: ?value-of<AccountUsageAccumulateParameter>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->service = $values['service'] ?? null;
        $this->zone = $values['zone'] ?? null;
        $this->accumulate = $values['accumulate'] ?? null;
    }
}
