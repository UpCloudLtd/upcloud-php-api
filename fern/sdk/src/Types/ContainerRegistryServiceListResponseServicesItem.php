<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryServiceListResponseServicesItem extends JsonSerializableType
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
     * @var ?string $registryUrl URL of the container registry endpoint
     */
    #[JsonProperty('registry_url')]
    public ?string $registryUrl;

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
     * @var DateTime $createdAt Timestamp when the service was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   tier: value-of<ContainerRegistryTier>,
     *   regionName: string,
     *   operationalState: value-of<ContainerRegistryOperationalState>,
     *   configuredStatus: value-of<ContainerRegistryConfiguredStatus>,
     *   createdAt: DateTime,
     *   registryUrl?: ?string,
     *   storageUsedBytes?: ?int,
     *   totalRepos?: ?int,
     *   repoLimit?: ?int,
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
        $this->registryUrl = $values['registryUrl'] ?? null;
        $this->storageUsedBytes = $values['storageUsedBytes'] ?? null;
        $this->totalRepos = $values['totalRepos'] ?? null;
        $this->repoLimit = $values['repoLimit'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
