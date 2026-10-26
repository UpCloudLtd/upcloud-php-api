<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Additional hints or metadata about the metric data.
 */
class DatabaseMetricsItemResponseHints extends JsonSerializableType
{
    /**
     * @var ?string $title A human-readable title for the metric data.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
