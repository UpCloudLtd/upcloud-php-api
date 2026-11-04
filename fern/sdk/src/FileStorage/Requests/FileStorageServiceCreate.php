<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStorageConfiguredStatus;
use Upcloud\Types\FileStorageNetworkCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\FileStorageShareCreate;
use Upcloud\Types\FileStorageLabelCreate;

class FileStorageServiceCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $zone Valid UpCloud zone in which the File Storage service is created. An attached private network must be in this same zone.
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var value-of<FileStorageConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var int $sizeGib
     */
    #[JsonProperty('size_gib')]
    public int $sizeGib;

    /**
     * @var ?bool $encrypted Enables AES-256-GCM encryption at rest. Encryption is disabled by default and cannot be changed after the service is created.
     */
    #[JsonProperty('encrypted')]
    public ?bool $encrypted;

    /**
     * @var ?array<FileStorageNetworkCreate> $networks Private network attachments to create with the service. At most one network can be attached, and it must be in the service zone.
     */
    #[JsonProperty('networks'), ArrayType([FileStorageNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<FileStorageShareCreate> $shares NFS shares to create with the service. The API currently supports at most 50 shares per service.
     */
    #[JsonProperty('shares'), ArrayType([FileStorageShareCreate::class])]
    public ?array $shares;

    /**
     * @var ?array<FileStorageLabelCreate> $labels Labels attached to the service for metadata and list filtering. Label keys must be unique within the service.
     */
    #[JsonProperty('labels'), ArrayType([FileStorageLabelCreate::class])]
    public ?array $labels;

    /**
     * @param array{
     *   name: string,
     *   zone: string,
     *   configuredStatus: value-of<FileStorageConfiguredStatus>,
     *   sizeGib: int,
     *   encrypted?: ?bool,
     *   networks?: ?array<FileStorageNetworkCreate>,
     *   shares?: ?array<FileStorageShareCreate>,
     *   labels?: ?array<FileStorageLabelCreate>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->zone = $values['zone'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->sizeGib = $values['sizeGib'];
        $this->encrypted = $values['encrypted'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->shares = $values['shares'] ?? null;
        $this->labels = $values['labels'] ?? null;
    }
}
