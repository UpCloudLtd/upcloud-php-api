<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerDiskStatsStats extends JsonSerializableType
{
    /**
     * @var ?ServerDiskStatsStatsDaily $daily
     */
    #[JsonProperty('daily')]
    public ?ServerDiskStatsStatsDaily $daily;

    /**
     * @var ?ServerDiskStatsStatsMonthly $monthly
     */
    #[JsonProperty('monthly')]
    public ?ServerDiskStatsStatsMonthly $monthly;

    /**
     * @var ?ServerDiskStatsStatsYearly $yearly
     */
    #[JsonProperty('yearly')]
    public ?ServerDiskStatsStatsYearly $yearly;

    /**
     * @var ?ServerDiskStatsStatsWeekly $weekly
     */
    #[JsonProperty('weekly')]
    public ?ServerDiskStatsStatsWeekly $weekly;

    /**
     * @param array{
     *   daily?: ?ServerDiskStatsStatsDaily,
     *   monthly?: ?ServerDiskStatsStatsMonthly,
     *   yearly?: ?ServerDiskStatsStatsYearly,
     *   weekly?: ?ServerDiskStatsStatsWeekly,
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
