<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for metrics data response.
 */
class DatabaseMetricsDataResponse extends JsonSerializableType
{
    /**
     * @var ?array<DatabaseMetricsColumnHeaderResponse> $cols
     */
    #[JsonProperty('cols'), ArrayType([DatabaseMetricsColumnHeaderResponse::class])]
    public ?array $cols;

    /**
     * @var ?array<array<mixed>> $rows
     */
    #[JsonProperty('rows'), ArrayType([['mixed']])]
    public ?array $rows;

    /**
     * @param array{
     *   cols?: ?array<DatabaseMetricsColumnHeaderResponse>,
     *   rows?: ?array<array<mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cols = $values['cols'] ?? null;
        $this->rows = $values['rows'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
