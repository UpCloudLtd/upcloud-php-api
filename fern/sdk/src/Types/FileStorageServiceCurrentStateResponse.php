<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Latest successfully reported state applied to the primary storage instance. Instance-reported fields include configured and operational status, size, encryption, networks, shares, metrics, and timestamps. UUID, name, zone, and labels are copied from the control-plane service when the snapshot is created. The snapshot can therefore lag behind the regular service response while a change is being applied.
 */
class FileStorageServiceCurrentStateResponse extends JsonSerializableType
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
     * @var string $zone UpCloud zone of the service.
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var value-of<FileStorageConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var value-of<FileStorageServiceCurrentStateResponseOperationalState> $operationalState Operational state reported for the applied instance configuration.
     */
    #[JsonProperty('operational_state')]
    public string $operationalState;

    /**
     * @var int $sizeGib
     */
    #[JsonProperty('size_gib')]
    public int $sizeGib;

    /**
     * @var bool $encrypted Whether AES-256-GCM encryption at rest is enabled on the applied storage instance.
     */
    #[JsonProperty('encrypted')]
    public bool $encrypted;

    /**
     * @var array<FileStorageNetworkDetailResponse> $networks Network endpoints reported by the applied storage instance.
     */
    #[JsonProperty('networks'), ArrayType([FileStorageNetworkDetailResponse::class])]
    public array $networks;

    /**
     * @var array<FileStorageShareDetailResponse> $shares NFS shares reported by the applied storage instance.
     */
    #[JsonProperty('shares'), ArrayType([FileStorageShareDetailResponse::class])]
    public array $shares;

    /**
     * @var array<FileStorageLabelDetails> $labels Labels copied from the control-plane service when this snapshot was created.
     */
    #[JsonProperty('labels'), ArrayType([FileStorageLabelDetails::class])]
    public array $labels;

    /**
     * @var FileStorageMetricsDetailResponse $metrics
     */
    #[JsonProperty('metrics')]
    public FileStorageMetricsDetailResponse $metrics;

    /**
     * @var DateTime $createdAt Creation time reported by the applied storage instance.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update time reported by the applied storage instance.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   zone: string,
     *   configuredStatus: value-of<FileStorageConfiguredStatus>,
     *   operationalState: value-of<FileStorageServiceCurrentStateResponseOperationalState>,
     *   sizeGib: int,
     *   encrypted: bool,
     *   networks: array<FileStorageNetworkDetailResponse>,
     *   shares: array<FileStorageShareDetailResponse>,
     *   labels: array<FileStorageLabelDetails>,
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
