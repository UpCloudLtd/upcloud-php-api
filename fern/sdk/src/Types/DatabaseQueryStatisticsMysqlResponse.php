<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for MySQL query statistics response.
 */
class DatabaseQueryStatisticsMysqlResponse extends JsonSerializableType
{
    /**
     * @var ?int $avgTimerWait Average wait time for the query.
     */
    #[JsonProperty('avg_timer_wait')]
    public ?int $avgTimerWait;

    /**
     * @var ?int $countStar Total number of times the query was executed.
     */
    #[JsonProperty('count_star')]
    public ?int $countStar;

    /**
     * @var ?string $digest Query digest hash.
     */
    #[JsonProperty('digest')]
    public ?string $digest;

    /**
     * @var ?string $digestText Normalized query text.
     */
    #[JsonProperty('digest_text')]
    public ?string $digestText;

    /**
     * @var ?DateTime $firstSeen Timestamp when the query was first seen.
     */
    #[JsonProperty('first_seen'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $firstSeen;

    /**
     * @var ?DateTime $lastSeen Timestamp when the query was last seen.
     */
    #[JsonProperty('last_seen'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSeen;

    /**
     * @var ?int $maxTimerWait Maximum wait time for the query.
     */
    #[JsonProperty('max_timer_wait')]
    public ?int $maxTimerWait;

    /**
     * @var ?int $minTimerWait Minimum wait time for the query.
     */
    #[JsonProperty('min_timer_wait')]
    public ?int $minTimerWait;

    /**
     * @var ?int $quantile95 95th percentile wait time.
     */
    #[JsonProperty('quantile_95')]
    public ?int $quantile95;

    /**
     * @var ?int $quantile99 99th percentile wait time.
     */
    #[JsonProperty('quantile_99')]
    public ?int $quantile99;

    /**
     * @var ?int $quantile999 99.9th percentile wait time.
     */
    #[JsonProperty('quantile_999')]
    public ?int $quantile999;

    /**
     * @var ?DateTime $querySampleSeen Timestamp when the sample query was seen.
     */
    #[JsonProperty('query_sample_seen'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $querySampleSeen;

    /**
     * @var ?string $querySampleText Sample query text.
     */
    #[JsonProperty('query_sample_text')]
    public ?string $querySampleText;

    /**
     * @var ?int $querySampleTimerWait Wait time for the sample query.
     */
    #[JsonProperty('query_sample_timer_wait')]
    public ?int $querySampleTimerWait;

    /**
     * @var ?string $schemaName Name of the database schema.
     */
    #[JsonProperty('schema_name')]
    public ?string $schemaName;

    /**
     * @var ?int $sumCreatedTmpDiskTables Total number of temporary disk tables created.
     */
    #[JsonProperty('sum_created_tmp_disk_tables')]
    public ?int $sumCreatedTmpDiskTables;

    /**
     * @var ?int $sumCreatedTmpTables Total number of temporary tables created.
     */
    #[JsonProperty('sum_created_tmp_tables')]
    public ?int $sumCreatedTmpTables;

    /**
     * @var ?int $sumErrors Total number of errors encountered.
     */
    #[JsonProperty('sum_errors')]
    public ?int $sumErrors;

    /**
     * @var ?int $sumLockTime Total lock time for the query.
     */
    #[JsonProperty('sum_lock_time')]
    public ?int $sumLockTime;

    /**
     * @var ?int $sumNoGoodIndexUsed Total number of times no good index was used.
     */
    #[JsonProperty('sum_no_good_index_used')]
    public ?int $sumNoGoodIndexUsed;

    /**
     * @var ?int $sumNoIndexUsed Total number of times no index was used.
     */
    #[JsonProperty('sum_no_index_used')]
    public ?int $sumNoIndexUsed;

    /**
     * @var ?int $sumRowsAffected Total number of rows affected.
     */
    #[JsonProperty('sum_rows_affected')]
    public ?int $sumRowsAffected;

    /**
     * @var ?int $sumRowsExamined Total number of rows examined.
     */
    #[JsonProperty('sum_rows_examined')]
    public ?int $sumRowsExamined;

    /**
     * @var ?int $sumRowsSent Total number of rows sent.
     */
    #[JsonProperty('sum_rows_sent')]
    public ?int $sumRowsSent;

    /**
     * @var ?int $sumSelectFullJoin Total number of full joins performed.
     */
    #[JsonProperty('sum_select_full_join')]
    public ?int $sumSelectFullJoin;

    /**
     * @var ?int $sumSelectFullRangeJoin Total number of full range joins performed.
     */
    #[JsonProperty('sum_select_full_range_join')]
    public ?int $sumSelectFullRangeJoin;

    /**
     * @var ?int $sumSelectRange Total number of range selects performed.
     */
    #[JsonProperty('sum_select_range')]
    public ?int $sumSelectRange;

    /**
     * @var ?int $sumSelectRangeCheck Total number of range checks performed.
     */
    #[JsonProperty('sum_select_range_check')]
    public ?int $sumSelectRangeCheck;

    /**
     * @var ?int $sumSelectScan Total number of select scans performed.
     */
    #[JsonProperty('sum_select_scan')]
    public ?int $sumSelectScan;

    /**
     * @var ?int $sumSortMergePasses Total number of sort merge passes.
     */
    #[JsonProperty('sum_sort_merge_passes')]
    public ?int $sumSortMergePasses;

    /**
     * @var ?int $sumSortRange Total number of sort range operations.
     */
    #[JsonProperty('sum_sort_range')]
    public ?int $sumSortRange;

    /**
     * @var ?int $sumSortRows Total number of rows sorted.
     */
    #[JsonProperty('sum_sort_rows')]
    public ?int $sumSortRows;

    /**
     * @var ?int $sumSortScan Total number of sort scans performed.
     */
    #[JsonProperty('sum_sort_scan')]
    public ?int $sumSortScan;

    /**
     * @var ?int $sumTimerWait Total wait time for the query.
     */
    #[JsonProperty('sum_timer_wait')]
    public ?int $sumTimerWait;

    /**
     * @var ?int $sumWarnings Total number of warnings generated.
     */
    #[JsonProperty('sum_warnings')]
    public ?int $sumWarnings;

    /**
     * @param array{
     *   avgTimerWait?: ?int,
     *   countStar?: ?int,
     *   digest?: ?string,
     *   digestText?: ?string,
     *   firstSeen?: ?DateTime,
     *   lastSeen?: ?DateTime,
     *   maxTimerWait?: ?int,
     *   minTimerWait?: ?int,
     *   quantile95?: ?int,
     *   quantile99?: ?int,
     *   quantile999?: ?int,
     *   querySampleSeen?: ?DateTime,
     *   querySampleText?: ?string,
     *   querySampleTimerWait?: ?int,
     *   schemaName?: ?string,
     *   sumCreatedTmpDiskTables?: ?int,
     *   sumCreatedTmpTables?: ?int,
     *   sumErrors?: ?int,
     *   sumLockTime?: ?int,
     *   sumNoGoodIndexUsed?: ?int,
     *   sumNoIndexUsed?: ?int,
     *   sumRowsAffected?: ?int,
     *   sumRowsExamined?: ?int,
     *   sumRowsSent?: ?int,
     *   sumSelectFullJoin?: ?int,
     *   sumSelectFullRangeJoin?: ?int,
     *   sumSelectRange?: ?int,
     *   sumSelectRangeCheck?: ?int,
     *   sumSelectScan?: ?int,
     *   sumSortMergePasses?: ?int,
     *   sumSortRange?: ?int,
     *   sumSortRows?: ?int,
     *   sumSortScan?: ?int,
     *   sumTimerWait?: ?int,
     *   sumWarnings?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avgTimerWait = $values['avgTimerWait'] ?? null;
        $this->countStar = $values['countStar'] ?? null;
        $this->digest = $values['digest'] ?? null;
        $this->digestText = $values['digestText'] ?? null;
        $this->firstSeen = $values['firstSeen'] ?? null;
        $this->lastSeen = $values['lastSeen'] ?? null;
        $this->maxTimerWait = $values['maxTimerWait'] ?? null;
        $this->minTimerWait = $values['minTimerWait'] ?? null;
        $this->quantile95 = $values['quantile95'] ?? null;
        $this->quantile99 = $values['quantile99'] ?? null;
        $this->quantile999 = $values['quantile999'] ?? null;
        $this->querySampleSeen = $values['querySampleSeen'] ?? null;
        $this->querySampleText = $values['querySampleText'] ?? null;
        $this->querySampleTimerWait = $values['querySampleTimerWait'] ?? null;
        $this->schemaName = $values['schemaName'] ?? null;
        $this->sumCreatedTmpDiskTables = $values['sumCreatedTmpDiskTables'] ?? null;
        $this->sumCreatedTmpTables = $values['sumCreatedTmpTables'] ?? null;
        $this->sumErrors = $values['sumErrors'] ?? null;
        $this->sumLockTime = $values['sumLockTime'] ?? null;
        $this->sumNoGoodIndexUsed = $values['sumNoGoodIndexUsed'] ?? null;
        $this->sumNoIndexUsed = $values['sumNoIndexUsed'] ?? null;
        $this->sumRowsAffected = $values['sumRowsAffected'] ?? null;
        $this->sumRowsExamined = $values['sumRowsExamined'] ?? null;
        $this->sumRowsSent = $values['sumRowsSent'] ?? null;
        $this->sumSelectFullJoin = $values['sumSelectFullJoin'] ?? null;
        $this->sumSelectFullRangeJoin = $values['sumSelectFullRangeJoin'] ?? null;
        $this->sumSelectRange = $values['sumSelectRange'] ?? null;
        $this->sumSelectRangeCheck = $values['sumSelectRangeCheck'] ?? null;
        $this->sumSelectScan = $values['sumSelectScan'] ?? null;
        $this->sumSortMergePasses = $values['sumSortMergePasses'] ?? null;
        $this->sumSortRange = $values['sumSortRange'] ?? null;
        $this->sumSortRows = $values['sumSortRows'] ?? null;
        $this->sumSortScan = $values['sumSortScan'] ?? null;
        $this->sumTimerWait = $values['sumTimerWait'] ?? null;
        $this->sumWarnings = $values['sumWarnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
