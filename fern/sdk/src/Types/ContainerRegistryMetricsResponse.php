<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryMetricsResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryMetricsResponseMetricsItem> $metrics Time-series metric data points
     */
    #[JsonProperty('metrics'), ArrayType([ContainerRegistryMetricsResponseMetricsItem::class])]
    public array $metrics;

    /**
     * @param array{
     *   metrics: array<ContainerRegistryMetricsResponseMetricsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->metrics = $values['metrics'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
