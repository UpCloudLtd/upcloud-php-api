<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for pending maintenance updates.
 */
class DatabaseMaintenancePendingUpdatesResponse extends JsonSerializableType
{
    /**
     * @var ?string $deadline The deadline by which the update must be applied as an RFC 3339 timestamp. Empty when no deadline is set.
     */
    #[JsonProperty('deadline')]
    public ?string $deadline;

    /**
     * @var ?string $description A description of the pending update
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $startAfter The earliest time after which the update can start as an RFC 3339 timestamp. Empty when no lower bound is set.
     */
    #[JsonProperty('start_after')]
    public ?string $startAfter;

    /**
     * @var ?string $startAt The exact scheduled start time for the update as an RFC 3339 timestamp. Empty when the update has not been scheduled.
     */
    #[JsonProperty('start_at')]
    public ?string $startAt;

    /**
     * @param array{
     *   deadline?: ?string,
     *   description?: ?string,
     *   startAfter?: ?string,
     *   startAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deadline = $values['deadline'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->startAfter = $values['startAfter'] ?? null;
        $this->startAt = $values['startAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
