<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryServiceEventsResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryServiceEventsResponseEventsItem> $events
     */
    #[JsonProperty('events'), ArrayType([ContainerRegistryServiceEventsResponseEventsItem::class])]
    public array $events;

    /**
     * @var int $total Total events matching the filter (pre-pagination).
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   events: array<ContainerRegistryServiceEventsResponseEventsItem>,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->events = $values['events'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
