<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Network traffic for one service. Ingress is bytes pushed, egress is bytes pulled.
 */
class ContainerRegistryTrafficMetricsResponse extends JsonSerializableType
{
    /**
     * @var value-of<ContainerRegistryTrafficMetricsResponseResolution> $resolution Bucket width. auto chooses 1h up to 31 days and 1d after that.
     */
    #[JsonProperty('resolution')]
    public string $resolution;

    /**
     * @var DateTime $from
     */
    #[JsonProperty('from'), Date(Date::TYPE_DATETIME)]
    public DateTime $from;

    /**
     * @var DateTime $to
     */
    #[JsonProperty('to'), Date(Date::TYPE_DATETIME)]
    public DateTime $to;

    /**
     * @var ContainerRegistryTrafficMetricsResponseTotals $totals
     */
    #[JsonProperty('totals')]
    public ContainerRegistryTrafficMetricsResponseTotals $totals;

    /**
     * @var array<ContainerRegistryTrafficMetricsResponseBucketsItem> $buckets
     */
    #[JsonProperty('buckets'), ArrayType([ContainerRegistryTrafficMetricsResponseBucketsItem::class])]
    public array $buckets;

    /**
     * @param array{
     *   resolution: value-of<ContainerRegistryTrafficMetricsResponseResolution>,
     *   from: DateTime,
     *   to: DateTime,
     *   totals: ContainerRegistryTrafficMetricsResponseTotals,
     *   buckets: array<ContainerRegistryTrafficMetricsResponseBucketsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resolution = $values['resolution'];
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->totals = $values['totals'];
        $this->buckets = $values['buckets'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
