<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchIndexTemplate extends JsonSerializableType
{
    /**
     * @var ?int $mappingNestedObjectsLimit The maximum number of nested JSON objects that a single document can contain across all nested types. This limit helps to prevent out of memory errors when a document contains too many nested objects. Default is 10000. Deprecated, use an index template instead.
     */
    #[JsonProperty('mapping_nested_objects_limit')]
    public ?int $mappingNestedObjectsLimit;

    /**
     * @var ?int $numberOfReplicas The number of replicas each primary shard has. Deprecated, use an index template instead.
     */
    #[JsonProperty('number_of_replicas')]
    public ?int $numberOfReplicas;

    /**
     * @var ?int $numberOfShards The number of primary shards that an index should have. Deprecated, use an index template instead.
     */
    #[JsonProperty('number_of_shards')]
    public ?int $numberOfShards;

    /**
     * @param array{
     *   mappingNestedObjectsLimit?: ?int,
     *   numberOfReplicas?: ?int,
     *   numberOfShards?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mappingNestedObjectsLimit = $values['mappingNestedObjectsLimit'] ?? null;
        $this->numberOfReplicas = $values['numberOfReplicas'] ?? null;
        $this->numberOfShards = $values['numberOfShards'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
