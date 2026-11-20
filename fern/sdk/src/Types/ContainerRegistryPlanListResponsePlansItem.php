<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryPlanListResponsePlansItem extends JsonSerializableType
{
    /**
     * @var string $name Plan identifier. Send this as `tier` when creating a service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $repositoryLimit Maximum number of repositories. 0 means no limit.
     */
    #[JsonProperty('repository_limit')]
    public int $repositoryLimit;

    /**
     * @var int $maxWebhooks Maximum number of webhooks. 0 means webhooks are not available.
     */
    #[JsonProperty('max_webhooks')]
    public int $maxWebhooks;

    /**
     * @var int $maxPrivateNetworks Maximum number of attached private networks. 0 means private networks are not available.
     */
    #[JsonProperty('max_private_networks')]
    public int $maxPrivateNetworks;

    /**
     * @var int $maxAllowlistEntries Maximum number of IP allowlist entries. 0 means the IP allowlist is not available.
     */
    #[JsonProperty('max_allowlist_entries')]
    public int $maxAllowlistEntries;

    /**
     * @var bool $privateAccess Whether the registry can be reached over a private network.
     */
    #[JsonProperty('private_access')]
    public bool $privateAccess;

    /**
     * @var int $rateLimitRps Requests per second the public endpoint accepts before answering 429.
     */
    #[JsonProperty('rate_limit_rps')]
    public int $rateLimitRps;

    /**
     * @var int $replicas Number of registry instances the service runs.
     */
    #[JsonProperty('replicas')]
    public int $replicas;

    /**
     * @param array{
     *   name: string,
     *   repositoryLimit: int,
     *   maxWebhooks: int,
     *   maxPrivateNetworks: int,
     *   maxAllowlistEntries: int,
     *   privateAccess: bool,
     *   rateLimitRps: int,
     *   replicas: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->repositoryLimit = $values['repositoryLimit'];
        $this->maxWebhooks = $values['maxWebhooks'];
        $this->maxPrivateNetworks = $values['maxPrivateNetworks'];
        $this->maxAllowlistEntries = $values['maxAllowlistEntries'];
        $this->privateAccess = $values['privateAccess'];
        $this->rateLimitRps = $values['rateLimitRps'];
        $this->replicas = $values['replicas'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
