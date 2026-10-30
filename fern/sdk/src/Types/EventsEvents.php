<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class EventsEvents extends JsonSerializableType
{
    /**
     * @var array<EventsEventsEventItem> $event List of events associated with servers
     */
    #[JsonProperty('event'), ArrayType([EventsEventsEventItem::class])]
    public array $event;

    /**
     * @param array{
     *   event: array<EventsEventsEventItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->event = $values['event'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
