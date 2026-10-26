<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a single metrics item response.
 */
class DatabaseMetricsItemResponse extends JsonSerializableType
{
    /**
     * @var ?DatabaseMetricsDataResponse $data
     */
    #[JsonProperty('data')]
    public ?DatabaseMetricsDataResponse $data;

    /**
     * @var ?DatabaseMetricsItemResponseHints $hints Additional hints or metadata about the metric data.
     */
    #[JsonProperty('hints')]
    public ?DatabaseMetricsItemResponseHints $hints;

    /**
     * @param array{
     *   data?: ?DatabaseMetricsDataResponse,
     *   hints?: ?DatabaseMetricsItemResponseHints,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
        $this->hints = $values['hints'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
