<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSearchBackpressureNodeDuress extends JsonSerializableType
{
    /**
     * @var ?float $cpuThreshold The CPU usage threshold (as a percentage) required for a node to be considered to be under duress. Default is 0.9
     */
    #[JsonProperty('cpu_threshold')]
    public ?float $cpuThreshold;

    /**
     * @var ?float $heapThreshold The heap usage threshold (as a percentage) required for a node to be considered to be under duress. Default is 0.7
     */
    #[JsonProperty('heap_threshold')]
    public ?float $heapThreshold;

    /**
     * @var ?int $numSuccessiveBreaches The number of successive limit breaches after which the node is considered to be under duress. Default is 3
     */
    #[JsonProperty('num_successive_breaches')]
    public ?int $numSuccessiveBreaches;

    /**
     * @param array{
     *   cpuThreshold?: ?float,
     *   heapThreshold?: ?float,
     *   numSuccessiveBreaches?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cpuThreshold = $values['cpuThreshold'] ?? null;
        $this->heapThreshold = $values['heapThreshold'] ?? null;
        $this->numSuccessiveBreaches = $values['numSuccessiveBreaches'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
