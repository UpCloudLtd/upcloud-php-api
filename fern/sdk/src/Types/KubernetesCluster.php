<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Kubernetes cluster
 */
class KubernetesCluster extends JsonSerializableType
{
    /**
     * @var ?array<string> $controlPlaneIpFilter
     */
    #[JsonProperty('control_plane_ip_filter'), ArrayType(['string'])]
    public ?array $controlPlaneIpFilter;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $network
     */
    #[JsonProperty('network')]
    public string $network;

    /**
     * @var ?string $networkCidr
     */
    #[JsonProperty('network_cidr')]
    public ?string $networkCidr;

    /**
     * @var ?value-of<KubernetesStorageEncryption> $storageEncryption
     */
    #[JsonProperty('storage_encryption')]
    public ?string $storageEncryption;

    /**
     * @var ?array<KubernetesNodeGroup> $nodeGroups
     */
    #[JsonProperty('node_groups'), ArrayType([KubernetesNodeGroup::class])]
    public ?array $nodeGroups;

    /**
     * @var ?value-of<KubernetesClusterState> $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var ?value-of<KubernetesClusterPlan> $plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?bool $privateNodeGroups
     */
    #[JsonProperty('private_node_groups')]
    public ?bool $privateNodeGroups;

    /**
     * @var string $version
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @var ?array<KubernetesAuthenticationIssuerConfig> $authentication
     */
    #[JsonProperty('authentication'), ArrayType([KubernetesAuthenticationIssuerConfig::class])]
    public ?array $authentication;

    /**
     * @var mixed $labels
     */
    #[JsonProperty('labels')]
    public mixed $labels;

    /**
     * @param array{
     *   name: string,
     *   network: string,
     *   zone: string,
     *   version: string,
     *   labels: mixed,
     *   controlPlaneIpFilter?: ?array<string>,
     *   networkCidr?: ?string,
     *   storageEncryption?: ?value-of<KubernetesStorageEncryption>,
     *   nodeGroups?: ?array<KubernetesNodeGroup>,
     *   state?: ?value-of<KubernetesClusterState>,
     *   uuid?: ?string,
     *   plan?: ?value-of<KubernetesClusterPlan>,
     *   privateNodeGroups?: ?bool,
     *   authentication?: ?array<KubernetesAuthenticationIssuerConfig>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->controlPlaneIpFilter = $values['controlPlaneIpFilter'] ?? null;
        $this->name = $values['name'];
        $this->network = $values['network'];
        $this->networkCidr = $values['networkCidr'] ?? null;
        $this->storageEncryption = $values['storageEncryption'] ?? null;
        $this->nodeGroups = $values['nodeGroups'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
        $this->zone = $values['zone'];
        $this->plan = $values['plan'] ?? null;
        $this->privateNodeGroups = $values['privateNodeGroups'] ?? null;
        $this->version = $values['version'];
        $this->authentication = $values['authentication'] ?? null;
        $this->labels = $values['labels'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
