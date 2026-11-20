<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesMysqlMysqlIncrementalBackup extends JsonSerializableType
{
    /**
     * @var bool $enabled Enable periodic incremental backups. When enabled, full_backup_week_schedule must be set. Incremental backups only store changes since the last backup, making them faster and more storage-efficient than full backups. This is particularly useful for large databases where daily full backups would be too time-consuming or expensive.
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var ?string $fullBackupWeekSchedule Comma-separated list of days of the week when full backups should be created. Valid values: mon, tue, wed, thu, fri, sat, sun
     */
    #[JsonProperty('full_backup_week_schedule')]
    public ?string $fullBackupWeekSchedule;

    /**
     * @param array{
     *   enabled: bool,
     *   fullBackupWeekSchedule?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
        $this->fullBackupWeekSchedule = $values['fullBackupWeekSchedule'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
