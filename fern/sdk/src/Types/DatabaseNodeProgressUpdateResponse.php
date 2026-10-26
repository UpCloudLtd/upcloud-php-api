<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for node progress update response.
 */
class DatabaseNodeProgressUpdateResponse extends JsonSerializableType
{
    /**
     * @var ?bool $completed Indicates whether the progress is fully completed.
     */
    #[JsonProperty('completed')]
    public ?bool $completed;

    /**
     * @var ?int $current The current progress value.
     */
    #[JsonProperty('current')]
    public ?int $current;

    /**
     * @var ?int $max The maximum value for the progress range.
     */
    #[JsonProperty('max')]
    public ?int $max;

    /**
     * @var ?int $min The minimum value for the progress range.
     */
    #[JsonProperty('min')]
    public ?int $min;

    /**
     * @var ?string $phase The current node progress.
     */
    #[JsonProperty('phase')]
    public ?string $phase;

    /**
     * @var ?string $unit The unit of measurement for the progress values (e.g., percent, MB).
     */
    #[JsonProperty('unit')]
    public ?string $unit;

    /**
     * @param array{
     *   completed?: ?bool,
     *   current?: ?int,
     *   max?: ?int,
     *   min?: ?int,
     *   phase?: ?string,
     *   unit?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->completed = $values['completed'] ?? null;
        $this->current = $values['current'] ?? null;
        $this->max = $values['max'] ?? null;
        $this->min = $values['min'] ?? null;
        $this->phase = $values['phase'] ?? null;
        $this->unit = $values['unit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
