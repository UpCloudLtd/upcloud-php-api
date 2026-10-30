<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Server event type
 */
class Events extends JsonSerializableType
{
    /**
     * @var ?EventsEvents $events
     */
    #[JsonProperty('events')]
    public ?EventsEvents $events;

    /**
     * @param array{
     *   events?: ?EventsEvents,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->events = $values['events'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
