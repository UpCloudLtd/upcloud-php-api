<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Infrequent backup window, OpenSearch only
 */
class DatabasePlanComponentsResponseBackupsInfrequent extends JsonSerializableType
{
    /**
     * @var ?int $intervalMinutes
     */
    #[JsonProperty('interval_minutes')]
    public ?int $intervalMinutes;

    /**
     * @var ?int $retentionDays
     */
    #[JsonProperty('retention_days')]
    public ?int $retentionDays;

    /**
     * @param array{
     *   intervalMinutes?: ?int,
     *   retentionDays?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->intervalMinutes = $values['intervalMinutes'] ?? null;
        $this->retentionDays = $values['retentionDays'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
