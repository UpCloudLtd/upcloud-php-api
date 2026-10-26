<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schedule for automatic block storage backups.
 */
class StorageBackupRule extends JsonSerializableType
{
    /**
     * @var value-of<StorageBackupRuleInterval> $interval Weekday when the backup is created, or `daily` to create a backup every day at the same time.
     */
    #[JsonProperty('interval')]
    public string $interval;

    /**
     * @var string $time UTC time of day when the backup is created, in `HHMM` format.
     */
    #[JsonProperty('time')]
    public string $time;

    /**
     * @var string $retention Number of days before the backup is automatically deleted, from 1 through 1095.
     */
    #[JsonProperty('retention')]
    public string $retention;

    /**
     * @param array{
     *   interval: value-of<StorageBackupRuleInterval>,
     *   time: string,
     *   retention: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interval = $values['interval'];
        $this->time = $values['time'];
        $this->retention = $values['retention'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
