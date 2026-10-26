<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * OpenSearch specific backup configuration response
 */
class DatabaseBackupConfigOpenSearchResponse extends JsonSerializableType
{
    /**
     * @var ?int $frequentIntervalMinutes Frequent backup interval in minutes
     */
    #[JsonProperty('frequent_interval_minutes')]
    public ?int $frequentIntervalMinutes;

    /**
     * @var ?int $frequentOldestAgeMinutes Oldest age for frequent backups in minutes
     */
    #[JsonProperty('frequent_oldest_age_minutes')]
    public ?int $frequentOldestAgeMinutes;

    /**
     * @var ?int $infrequentIntervalMinutes Infrequent backup interval in minutes
     */
    #[JsonProperty('infrequent_interval_minutes')]
    public ?int $infrequentIntervalMinutes;

    /**
     * @var ?int $infrequentOldestAgeMinutes Oldest age for infrequent backups in minutes
     */
    #[JsonProperty('infrequent_oldest_age_minutes')]
    public ?int $infrequentOldestAgeMinutes;

    /**
     * @var ?string $recoveryMode Recovery mode for backups
     */
    #[JsonProperty('recovery_mode')]
    public ?string $recoveryMode;

    /**
     * @param array{
     *   frequentIntervalMinutes?: ?int,
     *   frequentOldestAgeMinutes?: ?int,
     *   infrequentIntervalMinutes?: ?int,
     *   infrequentOldestAgeMinutes?: ?int,
     *   recoveryMode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->frequentIntervalMinutes = $values['frequentIntervalMinutes'] ?? null;
        $this->frequentOldestAgeMinutes = $values['frequentOldestAgeMinutes'] ?? null;
        $this->infrequentIntervalMinutes = $values['infrequentIntervalMinutes'] ?? null;
        $this->infrequentOldestAgeMinutes = $values['infrequentOldestAgeMinutes'] ?? null;
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
