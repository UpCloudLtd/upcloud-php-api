<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for a backup response.
 */
class DatabaseBackupResponse extends JsonSerializableType
{
    /**
     * @var ?string $backupName The name of the backup.
     */
    #[JsonProperty('backup_name')]
    public ?string $backupName;

    /**
     * @var ?DateTime $backupTime The time the backup was created.
     */
    #[JsonProperty('backup_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $backupTime;

    /**
     * @var ?int $dataSize The size of the backup data in bytes.
     */
    #[JsonProperty('data_size')]
    public ?int $dataSize;

    /**
     * @param array{
     *   backupName?: ?string,
     *   backupTime?: ?DateTime,
     *   dataSize?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backupName = $values['backupName'] ?? null;
        $this->backupTime = $values['backupTime'] ?? null;
        $this->dataSize = $values['dataSize'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
