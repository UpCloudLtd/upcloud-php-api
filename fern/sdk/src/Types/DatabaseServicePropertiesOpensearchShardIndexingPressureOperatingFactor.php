<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchShardIndexingPressureOperatingFactor extends JsonSerializableType
{
    /**
     * Specify the lower occupancy limit of the allocated quota of memory for the shard.
     *                     If the total memory usage of a shard is below this limit,
     *                     shard indexing backpressure decreases the current allocated memory for that shard.
     *                     Default is 0.75
     *
     * @var ?float $lower
     */
    #[JsonProperty('lower')]
    public ?float $lower;

    /**
     * Specify the optimal occupancy of the allocated quota of memory for the shard.
     *                     If the total memory usage of a shard is at this level,
     *                     shard indexing backpressure doesn’t change the current allocated memory for that shard.
     *                     Default is 0.85
     *
     * @var ?float $optimal
     */
    #[JsonProperty('optimal')]
    public ?float $optimal;

    /**
     * Specify the upper occupancy limit of the allocated quota of memory for the shard.
     *                     If the total memory usage of a shard is above this limit,
     *                     shard indexing backpressure increases the current allocated memory for that shard.
     *                     Default is 0.95
     *
     * @var ?float $upper
     */
    #[JsonProperty('upper')]
    public ?float $upper;

    /**
     * @param array{
     *   lower?: ?float,
     *   optimal?: ?float,
     *   upper?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->lower = $values['lower'] ?? null;
        $this->optimal = $values['optimal'] ?? null;
        $this->upper = $values['upper'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
