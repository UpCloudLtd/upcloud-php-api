<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerNetworkStatsStatsMonthly extends JsonSerializableType
{
    /**
     * @var ServerNetworkStatsSummary $summary
     */
    #[JsonProperty('summary')]
    public ServerNetworkStatsSummary $summary;

    /**
     * @param array{
     *   summary: ServerNetworkStatsSummary,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->summary = $values['summary'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
