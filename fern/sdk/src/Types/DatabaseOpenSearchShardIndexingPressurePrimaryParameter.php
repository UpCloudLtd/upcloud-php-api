<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseOpenSearchShardIndexingPressurePrimaryParameter extends JsonSerializableType
{
    /**
     * @var ?DatabaseOpenSearchShardIndexingPressurePrimaryParameterNode $node
     */
    #[JsonProperty('node')]
    public ?DatabaseOpenSearchShardIndexingPressurePrimaryParameterNode $node;

    /**
     * @var ?DatabaseOpenSearchShardIndexingPressurePrimaryParameterShard $shard
     */
    #[JsonProperty('shard')]
    public ?DatabaseOpenSearchShardIndexingPressurePrimaryParameterShard $shard;

    /**
     * @param array{
     *   node?: ?DatabaseOpenSearchShardIndexingPressurePrimaryParameterNode,
     *   shard?: ?DatabaseOpenSearchShardIndexingPressurePrimaryParameterShard,
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
