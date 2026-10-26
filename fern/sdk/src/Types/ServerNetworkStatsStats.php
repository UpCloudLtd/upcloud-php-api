<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerNetworkStatsStats extends JsonSerializableType
{
    /**
     * @var ?ServerNetworkStatsStatsDaily $daily
     */
    #[JsonProperty('daily')]
    public ?ServerNetworkStatsStatsDaily $daily;

    /**
     * @var ?ServerNetworkStatsStatsMonthly $monthly
     */
    #[JsonProperty('monthly')]
    public ?ServerNetworkStatsStatsMonthly $monthly;

    /**
     * @var ?ServerNetworkStatsStatsYearly $yearly
     */
    #[JsonProperty('yearly')]
    public ?ServerNetworkStatsStatsYearly $yearly;

    /**
     * @var ?ServerNetworkStatsStatsWeekly $weekly
     */
    #[JsonProperty('weekly')]
    public ?ServerNetworkStatsStatsWeekly $weekly;

    /**
     * @param array{
     *   daily?: ?ServerNetworkStatsStatsDaily,
     *   monthly?: ?ServerNetworkStatsStatsMonthly,
     *   yearly?: ?ServerNetworkStatsStatsYearly,
     *   weekly?: ?ServerNetworkStatsStatsWeekly,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->daily = $values['daily'] ?? null;
        $this->monthly = $values['monthly'] ?? null;
        $this->yearly = $values['yearly'] ?? null;
        $this->weekly = $values['weekly'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
