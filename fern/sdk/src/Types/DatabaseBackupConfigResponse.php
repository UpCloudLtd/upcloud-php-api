<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * General backup configuration schema
 */
class DatabaseBackupConfigResponse extends JsonSerializableType
{
    /**
     * @var ?int $interval Backup interval
     */
    #[JsonProperty('interval')]
    public ?int $interval;

    /**
     * @var ?int $maxCount Maximum number of backups to keep
     */
    #[JsonProperty('max_count')]
    public ?int $maxCount;

    /**
     * @var ?string $recoveryMode Recovery mode for backups
     */
    #[JsonProperty('recovery_mode')]
    public ?string $recoveryMode;

    /**
     * @param array{
     *   interval?: ?int,
     *   maxCount?: ?int,
     *   recoveryMode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->interval = $values['interval'] ?? null;
        $this->maxCount = $values['maxCount'] ?? null;
        $this->recoveryMode = $values['recoveryMode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
