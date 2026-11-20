<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryServiceDetailResponse extends JsonSerializableType
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
     * @var value-of<ContainerRegistryTier> $tier
     */
    #[JsonProperty('tier')]
    public string $tier;

    /**
     * @var string $regionName
     */
    #[JsonProperty('region_name')]
    public string $regionName;

    /**
     * @var value-of<ContainerRegistryOperationalState> $operationalState
     */
    #[JsonProperty('operational_state')]
    public string $operationalState;

    /**
     * @var value-of<ContainerRegistryConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var string $registryUrl URL of the container registry endpoint
     */
    #[JsonProperty('registry_url')]
    public string $registryUrl;

    /**
     * @var ?value-of<ContainerRegistryAccessMode> $accessMode
     */
    #[JsonProperty('access_mode')]
    public ?string $accessMode;

    /**
     * @var ?int $storageUsedBytes Storage currently used, in bytes
     */
    #[JsonProperty('storage_used_bytes')]
    public ?int $storageUsedBytes;

    /**
     * @var ?int $totalRepos Number of repositories in the registry
     */
    #[JsonProperty('total_repos')]
    public ?int $totalRepos;

    /**
     * @var ?int $repoLimit Maximum number of repositories allowed by the plan. 0 means unlimited.
     */
    #[JsonProperty('repo_limit')]
    public ?int $repoLimit;

    /**
     * @var ?ContainerRegistryServiceDetailResponseProperties $properties Customer-facing service configuration.
     */
    #[JsonProperty('properties')]
    public ?ContainerRegistryServiceDetailResponseProperties $properties;

    /**
     * @var ?array<ContainerRegistryServiceDetailResponseNetworksItem> $networks Public endpoint plus any attached private (SDN) networks
     */
    #[JsonProperty('networks'), ArrayType([ContainerRegistryServiceDetailResponseNetworksItem::class])]
    public ?array $networks;

    /**
     * @var ?array<ContainerRegistryServiceDetailResponseStateMessagesItem> $stateMessages Error-level messages describing the current state
     */
    #[JsonProperty('state_messages'), ArrayType([ContainerRegistryServiceDetailResponseStateMessagesItem::class])]
    public ?array $stateMessages;

    /**
     * @var ?ContainerRegistryServiceDetailResponseLoopStats $loopStats Summary of repeated provisioning failures, omitted when healthy
     */
    #[JsonProperty('loop_stats')]
    public ?ContainerRegistryServiceDetailResponseLoopStats $loopStats;

    /**
     * @var ?array<ContainerRegistryServiceDetailResponseLabelsItem> $labels Labels assigned to the service
     */
    #[JsonProperty('labels'), ArrayType([ContainerRegistryServiceDetailResponseLabelsItem::class])]
    public ?array $labels;

    /**
     * @var DateTime $createdAt Timestamp when the service was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the service was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?DateTime $deletedAt Timestamp when the service was deleted, null if active
     */
    #[JsonProperty('deleted_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deletedAt;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   tier: value-of<ContainerRegistryTier>,
     *   regionName: string,
     *   operationalState: value-of<ContainerRegistryOperationalState>,
     *   configuredStatus: value-of<ContainerRegistryConfiguredStatus>,
     *   registryUrl: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   accessMode?: ?value-of<ContainerRegistryAccessMode>,
     *   storageUsedBytes?: ?int,
     *   totalRepos?: ?int,
     *   repoLimit?: ?int,
     *   properties?: ?ContainerRegistryServiceDetailResponseProperties,
     *   networks?: ?array<ContainerRegistryServiceDetailResponseNetworksItem>,
     *   stateMessages?: ?array<ContainerRegistryServiceDetailResponseStateMessagesItem>,
     *   loopStats?: ?ContainerRegistryServiceDetailResponseLoopStats,
     *   labels?: ?array<ContainerRegistryServiceDetailResponseLabelsItem>,
     *   deletedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->tier = $values['tier'];
        $this->regionName = $values['regionName'];
        $this->operationalState = $values['operationalState'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->registryUrl = $values['registryUrl'];
        $this->accessMode = $values['accessMode'] ?? null;
        $this->storageUsedBytes = $values['storageUsedBytes'] ?? null;
        $this->totalRepos = $values['totalRepos'] ?? null;
        $this->repoLimit = $values['repoLimit'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->stateMessages = $values['stateMessages'] ?? null;
        $this->loopStats = $values['loopStats'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->deletedAt = $values['deletedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
