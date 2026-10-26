<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

class AccountNetworkUsageStatsStatItem extends JsonSerializableType
{
    /**
     * @var DateTime $startTime
     */
    #[JsonProperty('start_time'), Date(Date::TYPE_DATETIME)]
    public DateTime $startTime;

    /**
     * @var int $sentBytes
     */
    #[JsonProperty('sent_bytes')]
    public int $sentBytes;

    /**
     * @var int $totalSentBytes
     */
    #[JsonProperty('total_sent_bytes')]
    public int $totalSentBytes;

    /**
     * @var int $accumulatedQuotaBytes
     */
    #[JsonProperty('accumulated_quota_bytes')]
    public int $accumulatedQuotaBytes;

    /**
     * @var int $projectedMonthlyQuotaBytes
     */
    #[JsonProperty('projected_monthly_quota_bytes')]
    public int $projectedMonthlyQuotaBytes;

    /**
     * @var int $quotaIncreaseBytes
     */
    #[JsonProperty('quota_increase_bytes')]
    public int $quotaIncreaseBytes;

    /**
     * @param array{
     *   startTime: DateTime,
     *   sentBytes: int,
     *   totalSentBytes: int,
     *   accumulatedQuotaBytes: int,
     *   projectedMonthlyQuotaBytes: int,
     *   quotaIncreaseBytes: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startTime = $values['startTime'];
        $this->sentBytes = $values['sentBytes'];
        $this->totalSentBytes = $values['totalSentBytes'];
        $this->accumulatedQuotaBytes = $values['accumulatedQuotaBytes'];
        $this->projectedMonthlyQuotaBytes = $values['projectedMonthlyQuotaBytes'];
        $this->quotaIncreaseBytes = $values['quotaIncreaseBytes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
