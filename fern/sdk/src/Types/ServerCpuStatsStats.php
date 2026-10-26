<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerCpuStatsStats extends JsonSerializableType
{
    /**
     * @var ?ServerCpuStatsStatsDaily $daily
     */
    #[JsonProperty('daily')]
    public ?ServerCpuStatsStatsDaily $daily;

    /**
     * @var ?ServerCpuStatsStatsMonthly $monthly
     */
    #[JsonProperty('monthly')]
    public ?ServerCpuStatsStatsMonthly $monthly;

    /**
     * @var ?ServerCpuStatsStatsYearly $yearly
     */
    #[JsonProperty('yearly')]
    public ?ServerCpuStatsStatsYearly $yearly;

    /**
     * @var ?ServerCpuStatsStatsWeekly $weekly
     */
    #[JsonProperty('weekly')]
    public ?ServerCpuStatsStatsWeekly $weekly;

    /**
     * @param array{
     *   daily?: ?ServerCpuStatsStatsDaily,
     *   monthly?: ?ServerCpuStatsStatsMonthly,
     *   yearly?: ?ServerCpuStatsStatsYearly,
     *   weekly?: ?ServerCpuStatsStatsWeekly,
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
