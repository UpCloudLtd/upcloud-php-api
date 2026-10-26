<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for the detailed response of a service.
 */
class FileStorageServiceDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $zone
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @var ?string $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?string $operationalState
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?int $sizeGib
     */
    #[JsonProperty('size_gib')]
    public ?int $sizeGib;

    /**
     * @var ?bool $encrypted
     */
    #[JsonProperty('encrypted')]
    public ?bool $encrypted;

    /**
     * @var ?array<FileStorageNetworkDetailResponse> $networks
     */
    #[JsonProperty('networks'), ArrayType([FileStorageNetworkDetailResponse::class])]
    public ?array $networks;

    /**
     * @var ?array<FileStorageShareDetailResponse> $shares
     */
    #[JsonProperty('shares'), ArrayType([FileStorageShareDetailResponse::class])]
    public ?array $shares;

    /**
     * @var ?array<FileStorageLabelDetails> $labels
     */
    #[JsonProperty('labels'), ArrayType([FileStorageLabelDetails::class])]
    public ?array $labels;

    /**
     * @var ?array<FileStorageServiceDetailResponseStateMessagesItem> $stateMessages
     */
    #[JsonProperty('state_messages'), ArrayType([FileStorageServiceDetailResponseStateMessagesItem::class])]
    public ?array $stateMessages;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   zone?: ?string,
     *   configuredStatus?: ?string,
     *   operationalState?: ?string,
     *   sizeGib?: ?int,
     *   encrypted?: ?bool,
     *   networks?: ?array<FileStorageNetworkDetailResponse>,
     *   shares?: ?array<FileStorageShareDetailResponse>,
     *   labels?: ?array<FileStorageLabelDetails>,
     *   stateMessages?: ?array<FileStorageServiceDetailResponseStateMessagesItem>,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->zone = $values['zone'] ?? null;
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->operationalState = $values['operationalState'] ?? null;
        $this->sizeGib = $values['sizeGib'] ?? null;
        $this->encrypted = $values['encrypted'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->shares = $values['shares'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->stateMessages = $values['stateMessages'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
