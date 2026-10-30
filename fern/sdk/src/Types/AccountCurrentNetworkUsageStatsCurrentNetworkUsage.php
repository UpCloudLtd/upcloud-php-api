<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

class AccountCurrentNetworkUsageStatsCurrentNetworkUsage extends JsonSerializableType
{
    /**
     * @var DateTime $updated
     */
    #[JsonProperty('updated'), Date(Date::TYPE_DATETIME)]
    public DateTime $updated;

    /**
     * @var int $accumulatedQuotaBytes
     */
    #[JsonProperty('accumulated_quota_bytes')]
    public int $accumulatedQuotaBytes;

    /**
     * @var int $totalSentBytes
     */
    #[JsonProperty('total_sent_bytes')]
    public int $totalSentBytes;

    /**
     * @var int $hourlyQuotaIncreaseBytes
     */
    #[JsonProperty('hourly_quota_increase_bytes')]
    public int $hourlyQuotaIncreaseBytes;

    /**
     * @var int $projectedMonthlyQuotaBytes
     */
    #[JsonProperty('projected_monthly_quota_bytes')]
    public int $projectedMonthlyQuotaBytes;

    /**
     * @param array{
     *   updated: DateTime,
     *   accumulatedQuotaBytes: int,
     *   totalSentBytes: int,
     *   hourlyQuotaIncreaseBytes: int,
     *   projectedMonthlyQuotaBytes: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->updated = $values['updated'];
        $this->accumulatedQuotaBytes = $values['accumulatedQuotaBytes'];
        $this->totalSentBytes = $values['totalSentBytes'];
        $this->hourlyQuotaIncreaseBytes = $values['hourlyQuotaIncreaseBytes'];
        $this->projectedMonthlyQuotaBytes = $values['projectedMonthlyQuotaBytes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
