<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterNode extends JsonSerializableType
{
    /**
     * Define the percentage of the node-level memory
     *                             threshold that acts as a soft indicator for strain on a node.
     *                             Default is 0.7
     *
     * @var ?float $softLimit
     */
    #[JsonProperty('soft_limit')]
    public ?float $softLimit;

    /**
     * @param array{
     *   softLimit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->softLimit = $values['softLimit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
