<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Desired configuration, current lifecycle information, and latest available capacity metrics for a File Storage service. The effective configuration currently applied to storage is available from the current-state endpoint.
 */
class FileStorageServiceDetailResponse extends JsonSerializableType
{
    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $zone UpCloud zone in which the service is hosted.
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var value-of<FileStorageConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var value-of<FileStorageOperationalState> $operationalState
     */
    #[JsonProperty('operational_state')]
    public string $operationalState;

    /**
     * @var int $sizeGib
     */
    #[JsonProperty('size_gib')]
    public int $sizeGib;

    /**
     * @var bool $encrypted Whether immutable AES-256-GCM encryption at rest is enabled.
     */
    #[JsonProperty('encrypted')]
    public bool $encrypted;

    /**
     * @var array<FileStorageNetworkDetailResponse> $networks Private networks attached to the service.
     */
    #[JsonProperty('networks'), ArrayType([FileStorageNetworkDetailResponse::class])]
    public array $networks;

    /**
     * @var array<FileStorageShareDetailResponse> $shares NFS shares configured for the service.
     */
    #[JsonProperty('shares'), ArrayType([FileStorageShareDetailResponse::class])]
    public array $shares;

    /**
     * @var array<FileStorageLabelDetailResponse> $labels Labels attached to the service.
     */
    #[JsonProperty('labels'), ArrayType([FileStorageLabelDetailResponse::class])]
    public array $labels;

    /**
     * @var FileStorageMetricsDetailResponse $metrics
     */
    #[JsonProperty('metrics')]
    public FileStorageMetricsDetailResponse $metrics;

    /**
     * @var DateTime $createdAt Time at which the service was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Time at which the service was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   zone: string,
     *   configuredStatus: value-of<FileStorageConfiguredStatus>,
     *   operationalState: value-of<FileStorageOperationalState>,
     *   sizeGib: int,
     *   encrypted: bool,
     *   networks: array<FileStorageNetworkDetailResponse>,
     *   shares: array<FileStorageShareDetailResponse>,
     *   labels: array<FileStorageLabelDetailResponse>,
     *   metrics: FileStorageMetricsDetailResponse,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->zone = $values['zone'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->operationalState = $values['operationalState'];
        $this->sizeGib = $values['sizeGib'];
        $this->encrypted = $values['encrypted'];
        $this->networks = $values['networks'];
        $this->shares = $values['shares'];
        $this->labels = $values['labels'];
        $this->metrics = $values['metrics'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
