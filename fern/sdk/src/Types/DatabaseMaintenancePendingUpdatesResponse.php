<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

/**
 * Response schema for pending maintenance updates.
 */
class DatabaseMaintenancePendingUpdatesResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $deadline The deadline by which the update must be applied
     */
    #[JsonProperty('deadline'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deadline;

    /**
     * @var ?string $description A description of the pending update
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?DateTime $startAfter The earliest time after which the update can start
     */
    #[JsonProperty('start_after'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startAfter;

    /**
     * @var ?DateTime $startAt The exact scheduled start time for the update
     */
    #[JsonProperty('start_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startAt;

    /**
     * @param array{
     *   deadline?: ?DateTime,
     *   description?: ?string,
     *   startAfter?: ?DateTime,
     *   startAt?: ?DateTime,
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
