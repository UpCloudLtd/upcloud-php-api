<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSearchInsightsTopQueries extends JsonSerializableType
{
    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesCpu $cpu
     */
    #[JsonProperty('cpu')]
    public ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesCpu $cpu;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesLatency $latency
     */
    #[JsonProperty('latency')]
    public ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesLatency $latency;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesMemory $memory
     */
    #[JsonProperty('memory')]
    public ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesMemory $memory;

    /**
     * @param array{
     *   cpu?: ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesCpu,
     *   latency?: ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesLatency,
     *   memory?: ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueriesMemory,
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
