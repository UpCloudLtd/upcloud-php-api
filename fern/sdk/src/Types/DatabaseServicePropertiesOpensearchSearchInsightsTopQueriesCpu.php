<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesCpu extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Enable or disable top N query monitoring by the metric
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?int $topNSize
     */
    #[JsonProperty('top_n_size')]
    public ?int $topNSize;

    /**
     * @var ?string $windowSize Configure the window size of the top N queries. The value should be a time value with unit, e.g. 1m, 5s, 1h.
     */
    #[JsonProperty('window_size')]
    public ?string $windowSize;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   topNSize?: ?int,
     *   windowSize?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->topNSize = $values['topNSize'] ?? null;
        $this->windowSize = $values['windowSize'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
