<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Types\AccountResourceNetworkUsageType;
use Upcloud\Types\AccountUsageAccumulateParameter;

class GetAccountResourceNetworkUsageRequest extends JsonSerializableType
{
    /**
     * @var DateTime $from Data start timestamp in RFC 3339 format.
     */
    public DateTime $from;

    /**
     * @var DateTime $to Data end timestamp in RFC 3339 format.
     */
    public DateTime $to;

    /**
     * @var ?value-of<AccountResourceNetworkUsageType> $service Limit results to a service type. Repeat the parameter to include multiple service types.
     */
    public ?string $service;

    /**
     * @var ?string $resourceId Limit results to this resource UUID.
     */
    public ?string $resourceId;

    /**
     * @var ?string $zone Limit results to a zone. Repeat the parameter to include multiple zones.
     */
    public ?string $zone;

    /**
     * @var ?value-of<AccountUsageAccumulateParameter> $accumulate Accumulate the transfer statistics by hour or day.
     */
    public ?string $accumulate;

    /**
     * @param array{
     *   from: DateTime,
     *   to: DateTime,
     *   service?: ?value-of<AccountResourceNetworkUsageType>,
     *   resourceId?: ?string,
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
        $this->resourceId = $values['resourceId'] ?? null;
        $this->zone = $values['zone'] ?? null;
        $this->accumulate = $values['accumulate'] ?? null;
    }
}
