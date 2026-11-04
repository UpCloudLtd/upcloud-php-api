<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseOpenSearchSearchInsightsTopQueries extends JsonSerializableType
{
    /**
     * @var ?DatabaseOpenSearchSearchInsightsTopQueriesCpu $cpu
     */
    #[JsonProperty('cpu')]
    public ?DatabaseOpenSearchSearchInsightsTopQueriesCpu $cpu;

    /**
     * @var ?DatabaseOpenSearchSearchInsightsTopQueriesLatency $latency
     */
    #[JsonProperty('latency')]
    public ?DatabaseOpenSearchSearchInsightsTopQueriesLatency $latency;

    /**
     * @var ?DatabaseOpenSearchSearchInsightsTopQueriesMemory $memory
     */
    #[JsonProperty('memory')]
    public ?DatabaseOpenSearchSearchInsightsTopQueriesMemory $memory;

    /**
     * @param array{
     *   cpu?: ?DatabaseOpenSearchSearchInsightsTopQueriesCpu,
     *   latency?: ?DatabaseOpenSearchSearchInsightsTopQueriesLatency,
     *   memory?: ?DatabaseOpenSearchSearchInsightsTopQueriesMemory,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cpu = $values['cpu'] ?? null;
        $this->latency = $values['latency'] ?? null;
        $this->memory = $values['memory'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
