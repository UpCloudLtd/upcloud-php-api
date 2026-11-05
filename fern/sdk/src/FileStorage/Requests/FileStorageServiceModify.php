<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStorageConfiguredStatus;
use Upcloud\Types\FileStorageNetworkCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\FileStorageLabelCreate;

class FileStorageServiceModify extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<FileStorageConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?int $sizeGib
     */
    #[JsonProperty('size_gib')]
    public ?int $sizeGib;

    /**
     * @var ?array<FileStorageNetworkCreate> $networks Complete replacement for the service's attached private networks. An empty array or `null` detaches all networks. At most one network can be attached, and it must be in the service zone.
     */
    #[JsonProperty('networks'), ArrayType([FileStorageNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<FileStorageLabelCreate> $labels Complete replacement for the service's labels. An empty array or `null` removes all labels.
     */
    #[JsonProperty('labels'), ArrayType([FileStorageLabelCreate::class])]
    public ?array $labels;

    /**
     * @param array{
     *   name?: ?string,
     *   configuredStatus?: ?value-of<FileStorageConfiguredStatus>,
     *   sizeGib?: ?int,
     *   networks?: ?array<FileStorageNetworkCreate>,
     *   labels?: ?array<FileStorageLabelCreate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->sizeGib = $values['sizeGib'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->labels = $values['labels'] ?? null;
    }
}
