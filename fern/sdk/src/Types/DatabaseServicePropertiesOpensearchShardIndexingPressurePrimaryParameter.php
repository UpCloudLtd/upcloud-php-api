<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameter extends JsonSerializableType
{
    /**
     * @var ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterNode $node
     */
    #[JsonProperty('node')]
    public ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterNode $node;

    /**
     * @var ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterShard $shard
     */
    #[JsonProperty('shard')]
    public ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterShard $shard;

    /**
     * @param array{
     *   node?: ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterNode,
     *   shard?: ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameterShard,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->node = $values['node'] ?? null;
        $this->shard = $values['shard'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
