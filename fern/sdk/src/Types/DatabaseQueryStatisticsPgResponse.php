<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for PostgreSQL query statistics response.
 */
class DatabaseQueryStatisticsPgResponse extends JsonSerializableType
{
    /**
     * @var ?int $blkReadTime Time spent reading data blocks, in milliseconds.
     */
    #[JsonProperty('blk_read_time')]
    public ?int $blkReadTime;

    /**
     * @var ?int $blkWriteTime Time spent writing data blocks, in milliseconds.
     */
    #[JsonProperty('blk_write_time')]
    public ?int $blkWriteTime;

    /**
     * @var ?int $calls Number of times the query was executed.
     */
    #[JsonProperty('calls')]
    public ?int $calls;

    /**
     * @var ?string $databaseName Name of the database.
     */
    #[JsonProperty('database_name')]
    public ?string $databaseName;

    /**
     * @var ?int $localBlksDirtied Number of local blocks dirtied.
     */
    #[JsonProperty('local_blks_dirtied')]
    public ?int $localBlksDirtied;

    /**
     * @var ?int $localBlksHit Number of local block cache hits.
     */
    #[JsonProperty('local_blks_hit')]
    public ?int $localBlksHit;

    /**
     * @var ?int $localBlksRead Number of local blocks read.
     */
    #[JsonProperty('local_blks_read')]
    public ?int $localBlksRead;

    /**
     * @var ?int $localBlksWritten Number of local blocks written.
     */
    #[JsonProperty('local_blks_written')]
    public ?int $localBlksWritten;

    /**
     * @var ?int $maxTime Maximum execution time, in milliseconds.
     */
    #[JsonProperty('max_time')]
    public ?int $maxTime;

    /**
     * @var ?int $meanTime Mean execution time, in milliseconds.
     */
    #[JsonProperty('mean_time')]
    public ?int $meanTime;

    /**
     * @var ?int $minTime Minimum execution time, in milliseconds.
     */
    #[JsonProperty('min_time')]
    public ?int $minTime;

    /**
     * @var ?string $query The SQL query text.
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?int $rows Total number of rows returned or affected.
     */
    #[JsonProperty('rows')]
    public ?int $rows;

    /**
     * @var ?int $sharedBlksDirtied Number of shared blocks dirtied.
     */
    #[JsonProperty('shared_blks_dirtied')]
    public ?int $sharedBlksDirtied;

    /**
     * @var ?int $sharedBlksHit Number of shared block cache hits.
     */
    #[JsonProperty('shared_blks_hit')]
    public ?int $sharedBlksHit;

    /**
     * @var ?int $sharedBlksRead Number of shared blocks read.
     */
    #[JsonProperty('shared_blks_read')]
    public ?int $sharedBlksRead;

    /**
     * @var ?int $sharedBlksWritten Number of shared blocks written.
     */
    #[JsonProperty('shared_blks_written')]
    public ?int $sharedBlksWritten;

    /**
     * @var ?int $stddevTime Standard deviation of execution time, in milliseconds.
     */
    #[JsonProperty('stddev_time')]
    public ?int $stddevTime;

    /**
     * @var ?int $tempBlksRead Number of temporary blocks read.
     */
    #[JsonProperty('temp_blks_read')]
    public ?int $tempBlksRead;

    /**
     * @var ?int $tempBlksWritten Number of temporary blocks written.
     */
    #[JsonProperty('temp_blks_written')]
    public ?int $tempBlksWritten;

    /**
     * @var ?int $totalTime Total execution time, in milliseconds.
     */
    #[JsonProperty('total_time')]
    public ?int $totalTime;

    /**
     * @var ?string $userName Name of the user who executed the query.
     */
    #[JsonProperty('user_name')]
    public ?string $userName;

    /**
     * @param array{
     *   blkReadTime?: ?int,
     *   blkWriteTime?: ?int,
     *   calls?: ?int,
     *   databaseName?: ?string,
     *   localBlksDirtied?: ?int,
     *   localBlksHit?: ?int,
     *   localBlksRead?: ?int,
     *   localBlksWritten?: ?int,
     *   maxTime?: ?int,
     *   meanTime?: ?int,
     *   minTime?: ?int,
     *   query?: ?string,
     *   rows?: ?int,
     *   sharedBlksDirtied?: ?int,
     *   sharedBlksHit?: ?int,
     *   sharedBlksRead?: ?int,
     *   sharedBlksWritten?: ?int,
     *   stddevTime?: ?int,
     *   tempBlksRead?: ?int,
     *   tempBlksWritten?: ?int,
     *   totalTime?: ?int,
     *   userName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blkReadTime = $values['blkReadTime'] ?? null;
        $this->blkWriteTime = $values['blkWriteTime'] ?? null;
        $this->calls = $values['calls'] ?? null;
        $this->databaseName = $values['databaseName'] ?? null;
        $this->localBlksDirtied = $values['localBlksDirtied'] ?? null;
        $this->localBlksHit = $values['localBlksHit'] ?? null;
        $this->localBlksRead = $values['localBlksRead'] ?? null;
        $this->localBlksWritten = $values['localBlksWritten'] ?? null;
        $this->maxTime = $values['maxTime'] ?? null;
        $this->meanTime = $values['meanTime'] ?? null;
        $this->minTime = $values['minTime'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->rows = $values['rows'] ?? null;
        $this->sharedBlksDirtied = $values['sharedBlksDirtied'] ?? null;
        $this->sharedBlksHit = $values['sharedBlksHit'] ?? null;
        $this->sharedBlksRead = $values['sharedBlksRead'] ?? null;
        $this->sharedBlksWritten = $values['sharedBlksWritten'] ?? null;
        $this->stddevTime = $values['stddevTime'] ?? null;
        $this->tempBlksRead = $values['tempBlksRead'] ?? null;
        $this->tempBlksWritten = $values['tempBlksWritten'] ?? null;
        $this->totalTime = $values['totalTime'] ?? null;
        $this->userName = $values['userName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
