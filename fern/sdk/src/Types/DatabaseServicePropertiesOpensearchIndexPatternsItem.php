<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Allows you to create glob style patterns and set a max number of indexes matching this pattern you want to keep. Creating indexes exceeding this value will cause the oldest one to get deleted. You could for example create a pattern looking like 'logs.?' and then create index logs.1, logs.2 etc, it will delete logs.1 once you create logs.6. Do note 'logs.?' does not apply to logs.10. Note: Setting max_index_count to 0 will do nothing and the pattern gets ignored.
 */
class DatabaseServicePropertiesOpensearchIndexPatternsItem extends JsonSerializableType
{
    /**
     * @var int $maxIndexCount
     */
    #[JsonProperty('max_index_count')]
    public int $maxIndexCount;

    /**
     * @var string $pattern
     */
    #[JsonProperty('pattern')]
    public string $pattern;

    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchIndexPatternsItemSortingAlgorithm> $sortingAlgorithm
     */
    #[JsonProperty('sorting_algorithm')]
    public ?string $sortingAlgorithm;

    /**
     * @param array{
     *   maxIndexCount: int,
     *   pattern: string,
     *   sortingAlgorithm?: ?value-of<DatabaseServicePropertiesOpensearchIndexPatternsItemSortingAlgorithm>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->maxIndexCount = $values['maxIndexCount'];
        $this->pattern = $values['pattern'];
        $this->sortingAlgorithm = $values['sortingAlgorithm'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
