<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseOpenSearchClusterSearchRequestSlowlog extends JsonSerializableType
{
    /**
     * @var ?value-of<DatabaseOpenSearchClusterSearchRequestSlowlogLevel> $level
     */
    #[JsonProperty('level')]
    public ?string $level;

    /**
     * @var ?DatabaseOpenSearchClusterSearchRequestSlowlogThreshold $threshold
     */
    #[JsonProperty('threshold')]
    public ?DatabaseOpenSearchClusterSearchRequestSlowlogThreshold $threshold;

    /**
     * @param array{
     *   level?: ?value-of<DatabaseOpenSearchClusterSearchRequestSlowlogLevel>,
     *   threshold?: ?DatabaseOpenSearchClusterSearchRequestSlowlogThreshold,
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
