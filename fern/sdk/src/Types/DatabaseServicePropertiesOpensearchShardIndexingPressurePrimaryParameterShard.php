<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterShard extends JsonSerializableType
{
    /**
     * Specify the minimum assigned quota for a new shard in any role (coordinator, primary, or replica).
     *                             Shard indexing backpressure increases or decreases this allocated quota based on the inflow of traffic for the shard.
     *                             Default is 0.001
     *
     * @var ?float $minLimit
     */
    #[JsonProperty('min_limit')]
    public ?float $minLimit;

    /**
     * @param array{
     *   minLimit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->minLimit = $values['minLimit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
