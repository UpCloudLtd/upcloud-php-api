<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Kubernetes cluster node
 */
class KubernetesNodeGroupDetails extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var array<KubernetesNode> $nodes List of node group nodes (experimental)
     */
    #[JsonProperty('nodes'), ArrayType([KubernetesNode::class])]
    public array $nodes;

    /**
     * @var int $count
     */
    #[JsonProperty('count')]
    public int $count;

    /**
     * @var ?array<KubernetesKubeletArg> $kubeletArgs
     */
    #[JsonProperty('kubelet_args'), ArrayType([KubernetesKubeletArg::class])]
    public ?array $kubeletArgs;

    /**
     * @var ?array<KubernetesLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([KubernetesLabel::class])]
    public ?array $labels;

    /**
     * @var string $plan
     */
    #[JsonProperty('plan')]
    public string $plan;

    /**
     * @var ?KubernetesNodeGroupCustomPlan $customPlan
     */
    #[JsonProperty('custom_plan')]
    public ?KubernetesNodeGroupCustomPlan $customPlan;

    /**
     * @var ?KubernetesNodeGroupCloudNativePlan $cloudNativePlan
     */
    #[JsonProperty('cloud_native_plan')]
    public ?KubernetesNodeGroupCloudNativePlan $cloudNativePlan;

    /**
     * @var ?KubernetesNodeGroupGpuPlan $gpuPlan
     */
    #[JsonProperty('gpu_plan')]
    public ?KubernetesNodeGroupGpuPlan $gpuPlan;

    /**
     * @var ?array<string> $sshKeys
     */
    #[JsonProperty('ssh_keys'), ArrayType(['string'])]
    public ?array $sshKeys;

    /**
     * @var ?value-of<KubernetesNodeGroupState> $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $storage
     */
    #[JsonProperty('storage')]
    public ?string $storage;

    /**
     * @var ?value-of<KubernetesStorageEncryption> $storageEncryption
     */
    #[JsonProperty('storage_encryption')]
    public ?string $storageEncryption;

    /**
     * @var ?array<KubernetesTaint> $taints
     */
    #[JsonProperty('taints'), ArrayType([KubernetesTaint::class])]
    public ?array $taints;

    /**
     * @var ?bool $antiAffinity
     */
    #[JsonProperty('anti_affinity')]
    public ?bool $antiAffinity;

    /**
     * @var ?bool $utilityNetworkAccess
     */
    #[JsonProperty('utility_network_access')]
    public ?bool $utilityNetworkAccess;

    /**
     * @var ?KubernetesNodeUpdates $nodeUpdates
     */
    #[JsonProperty('node_updates')]
    public ?KubernetesNodeUpdates $nodeUpdates;

    /**
     * @param array{
     *   nodes: array<KubernetesNode>,
     *   count: int,
     *   plan: string,
     *   name?: ?string,
     *   kubeletArgs?: ?array<KubernetesKubeletArg>,
     *   labels?: ?array<KubernetesLabel>,
     *   customPlan?: ?KubernetesNodeGroupCustomPlan,
     *   cloudNativePlan?: ?KubernetesNodeGroupCloudNativePlan,
     *   gpuPlan?: ?KubernetesNodeGroupGpuPlan,
     *   sshKeys?: ?array<string>,
     *   state?: ?value-of<KubernetesNodeGroupState>,
     *   storage?: ?string,
     *   storageEncryption?: ?value-of<KubernetesStorageEncryption>,
     *   taints?: ?array<KubernetesTaint>,
     *   antiAffinity?: ?bool,
     *   utilityNetworkAccess?: ?bool,
     *   nodeUpdates?: ?KubernetesNodeUpdates,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->nodes = $values['nodes'];
        $this->count = $values['count'];
        $this->kubeletArgs = $values['kubeletArgs'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->plan = $values['plan'];
        $this->customPlan = $values['customPlan'] ?? null;
        $this->cloudNativePlan = $values['cloudNativePlan'] ?? null;
        $this->gpuPlan = $values['gpuPlan'] ?? null;
        $this->sshKeys = $values['sshKeys'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->storage = $values['storage'] ?? null;
        $this->storageEncryption = $values['storageEncryption'] ?? null;
        $this->taints = $values['taints'] ?? null;
        $this->antiAffinity = $values['antiAffinity'] ?? null;
        $this->utilityNetworkAccess = $values['utilityNetworkAccess'] ?? null;
        $this->nodeUpdates = $values['nodeUpdates'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
