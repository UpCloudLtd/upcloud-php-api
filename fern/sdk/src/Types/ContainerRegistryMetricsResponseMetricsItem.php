<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

class ContainerRegistryMetricsResponseMetricsItem extends JsonSerializableType
{
    /**
     * @var DateTime $timestamp Timestamp of the metric data point
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public DateTime $timestamp;

    /**
     * @var ?int $storageBytes Storage used in bytes
     */
    #[JsonProperty('storage_bytes')]
    public ?int $storageBytes;

    /**
     * @var ?float $storageGb Storage used in gigabytes
     */
    #[JsonProperty('storage_gb')]
    public ?float $storageGb;

    /**
     * @var ?int $imageCount Total number of images stored
     */
    #[JsonProperty('image_count')]
    public ?int $imageCount;

    /**
     * @var ?int $pullCount Number of image pulls in this period
     */
    #[JsonProperty('pull_count')]
    public ?int $pullCount;

    /**
     * @var ?int $pushCount Number of image pushes in this period
     */
    #[JsonProperty('push_count')]
    public ?int $pushCount;

    /**
     * @var ?int $bandwidthEgressBytes Egress bandwidth in bytes
     */
    #[JsonProperty('bandwidth_egress_bytes')]
    public ?int $bandwidthEgressBytes;

    /**
     * @var ?float $bandwidthEgressGb Egress bandwidth in gigabytes
     */
    #[JsonProperty('bandwidth_egress_gb')]
    public ?float $bandwidthEgressGb;

    /**
     * @param array{
     *   timestamp: DateTime,
     *   storageBytes?: ?int,
     *   storageGb?: ?float,
     *   imageCount?: ?int,
     *   pullCount?: ?int,
     *   pushCount?: ?int,
     *   bandwidthEgressBytes?: ?int,
     *   bandwidthEgressGb?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timestamp = $values['timestamp'];
        $this->storageBytes = $values['storageBytes'] ?? null;
        $this->storageGb = $values['storageGb'] ?? null;
        $this->imageCount = $values['imageCount'] ?? null;
        $this->pullCount = $values['pullCount'] ?? null;
        $this->pushCount = $values['pushCount'] ?? null;
        $this->bandwidthEgressBytes = $values['bandwidthEgressBytes'] ?? null;
        $this->bandwidthEgressGb = $values['bandwidthEgressGb'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
