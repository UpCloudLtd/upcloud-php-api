<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for a maintenance window response.
 */
class DatabaseMaintenanceWindowResponse extends JsonSerializableType
{
    /**
     * @var ?string $dow Day of the week when maintenance occurs (e.g., Monday, Tuesday).
     */
    #[JsonProperty('dow')]
    public ?string $dow;

    /**
     * @var ?string $time Time of day when maintenance should start (e.g., HH:MM:SS format).
     */
    #[JsonProperty('time')]
    public ?string $time;

    /**
     * @var ?array<DatabaseMaintenancePendingUpdatesResponse> $pendingUpdates List of updates pending during this maintenance window.
     */
    #[JsonProperty('pending_updates'), ArrayType([DatabaseMaintenancePendingUpdatesResponse::class])]
    public ?array $pendingUpdates;

    /**
     * @param array{
     *   dow?: ?string,
     *   time?: ?string,
     *   pendingUpdates?: ?array<DatabaseMaintenancePendingUpdatesResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dow = $values['dow'] ?? null;
        $this->time = $values['time'] ?? null;
        $this->pendingUpdates = $values['pendingUpdates'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
