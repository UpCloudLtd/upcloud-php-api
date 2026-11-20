<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlog extends JsonSerializableType
{
    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogLevel> $level
     */
    #[JsonProperty('level')]
    public ?string $level;

    /**
     * @var ?DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogThreshold $threshold
     */
    #[JsonProperty('threshold')]
    public ?DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogThreshold $threshold;

    /**
     * @param array{
     *   level?: ?value-of<DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogLevel>,
     *   threshold?: ?DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogThreshold,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->level = $values['level'] ?? null;
        $this->threshold = $values['threshold'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
