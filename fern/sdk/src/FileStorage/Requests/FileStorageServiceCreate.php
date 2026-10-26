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
     * @var string $zone Indicates the zone where the service will be created.
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
     * @var ?bool $encrypted Indicates whether encryption at rest is enabled for the service.
     */
    #[JsonProperty('encrypted')]
    public ?bool $encrypted;

    /**
     * @var ?array<FileStorageNetworkCreate> $networks
     */
    #[JsonProperty('networks'), ArrayType([FileStorageNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<FileStorageShareCreate> $shares
     */
    #[JsonProperty('shares'), ArrayType([FileStorageShareCreate::class])]
    public ?array $shares;

    /**
     * @var ?array<FileStorageLabelCreate> $labels Labels
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
