<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Per-resource quota limits for an account.
 */
class AccountResourceLimits extends JsonSerializableType
{
    /**
     * @var int $managedDatabases The maximum number of managed databases allowed.
     */
    #[JsonProperty('managed_databases')]
    public int $managedDatabases;

    /**
     * @var ?int $managedDatabasesDev The maximum number of development managed databases allowed. Null means unlimited.
     */
    #[JsonProperty('managed_databases_dev')]
    public ?int $managedDatabasesDev;

    /**
     * @var int $networkPeerings The maximum number of network peerings allowed.
     */
    #[JsonProperty('network_peerings')]
    public int $networkPeerings;

    /**
     * @var int $fileStorages The maximum number of file storage instances allowed.
     */
    #[JsonProperty('file_storages')]
    public int $fileStorages;

    /**
     * @var int $managedContainerRegistries The maximum number of managed container registries allowed.
     */
    #[JsonProperty('managed_container_registries')]
    public int $managedContainerRegistries;

    /**
     * @var int $managedKubernetes The maximum number of managed Kubernetes clusters allowed.
     */
    #[JsonProperty('managed_kubernetes')]
    public int $managedKubernetes;

    /**
     * @var int $tags The maximum number of tags allowed.
     */
    #[JsonProperty('tags')]
    public int $tags;

    /**
     * @var int $cores The maximum number of CPU cores allowed.
     */
    #[JsonProperty('cores')]
    public int $cores;

    /**
     * @var ?int $cloudServerDev1Xcpu1Gb10GbPlans The maximum number of cloud server dev 1xCPU 1GB 10GB plans allowed.
     */
    #[JsonProperty('cloud_server_dev_1xcpu_1gb_10gb_plans')]
    public ?int $cloudServerDev1Xcpu1Gb10GbPlans;

    /**
     * @var ?int $cloudServerDev1Xcpu1GbPlans The maximum number of cloud server dev 1xCPU 1GB 10GB plans allowed.
     */
    #[JsonProperty('cloud_server_dev_1xcpu_1gb_plans')]
    public ?int $cloudServerDev1Xcpu1GbPlans;

    /**
     * @var ?int $cloudServerStarter1Xcpu1GbPlans The maximum number of cloud server starter 1xCPU 1GB plans allowed. Null means unlimited.
     */
    #[JsonProperty('cloud_server_starter_1xcpu_1gb_plans')]
    public ?int $cloudServerStarter1Xcpu1GbPlans;

    /**
     * @var ?int $firewallRules The maximum number of firewall rules allowed. Null means unlimited.
     */
    #[JsonProperty('firewall_rules')]
    public ?int $firewallRules;

    /**
     * @var ?int $serverGroups The maximum number of server groups allowed. Null means unlimited.
     */
    #[JsonProperty('server_groups')]
    public ?int $serverGroups;

    /**
     * @var int $storageHdd The maximum amount of HDD storage (in GiB) allowed.
     */
    #[JsonProperty('storage_hdd')]
    public int $storageHdd;

    /**
     * @var int $networks The maximum number of networks allowed.
     */
    #[JsonProperty('networks')]
    public int $networks;

    /**
     * @var int $networkGatewaysEssentials The maximum number of essential network gateways allowed.
     */
    #[JsonProperty('network_gateways_essentials')]
    public int $networkGatewaysEssentials;

    /**
     * @var int $networkGateways The maximum number of network gateways allowed.
     */
    #[JsonProperty('network_gateways')]
    public int $networkGateways;

    /**
     * @var int $storageSsd The maximum amount of SSD storage (in GiB) allowed.
     */
    #[JsonProperty('storage_ssd')]
    public int $storageSsd;

    /**
     * @var int $loadBalancersEssentials The maximum number of essential load balancers allowed.
     */
    #[JsonProperty('load_balancers_essentials')]
    public int $loadBalancersEssentials;

    /**
     * @var int $loadBalancers The maximum number of load balancers allowed.
     */
    #[JsonProperty('load_balancers')]
    public int $loadBalancers;

    /**
     * @var int $gpus The maximum number of GPUs allowed.
     */
    #[JsonProperty('gpus')]
    public int $gpus;

    /**
     * @var int $detachedInterfaces The maximum number of detached network interfaces allowed.
     */
    #[JsonProperty('detached_interfaces')]
    public int $detachedInterfaces;

    /**
     * @var int $detachedFloatingIps The maximum number of detached floating IPs allowed.
     */
    #[JsonProperty('detached_floating_ips')]
    public int $detachedFloatingIps;

    /**
     * @var int $managedObjectStorages The maximum number of managed object storage instances allowed.
     */
    #[JsonProperty('managed_object_storages')]
    public int $managedObjectStorages;

    /**
     * @var int $memory The maximum amount of memory (in MiB) allowed.
     */
    #[JsonProperty('memory')]
    public int $memory;

    /**
     * @var int $ntpExcessGib The maximum amount of excess NTP data (in GiB) allowed.
     */
    #[JsonProperty('ntp_excess_gib')]
    public int $ntpExcessGib;

    /**
     * @var int $publicIpv4 The maximum number of public IPv4 addresses allowed.
     */
    #[JsonProperty('public_ipv4')]
    public int $publicIpv4;

    /**
     * @var int $publicIpv6 The maximum number of public IPv6 addresses allowed.
     */
    #[JsonProperty('public_ipv6')]
    public int $publicIpv6;

    /**
     * @var int $routers The maximum number of routers allowed.
     */
    #[JsonProperty('routers')]
    public int $routers;

    /**
     * @var int $storageMaxiops The maximum amount of MaxiOPS storage (in GiB) allowed.
     */
    #[JsonProperty('storage_maxiops')]
    public int $storageMaxiops;

    /**
     * @var int $storageStandard The maximum amount of standard storage (in GiB) allowed.
     */
    #[JsonProperty('storage_standard')]
    public int $storageStandard;

    /**
     * @var int $storageTotal The maximum total amount of storage (in GiB) allowed.
     */
    #[JsonProperty('storage_total')]
    public int $storageTotal;

    /**
     * @var ?int $cdns The maximum number of CDN zones allowed. Null means unlimited.
     */
    #[JsonProperty('cdns')]
    public ?int $cdns;

    /**
     * @param array{
     *   managedDatabases: int,
     *   networkPeerings: int,
     *   fileStorages: int,
     *   managedContainerRegistries: int,
     *   managedKubernetes: int,
     *   tags: int,
     *   cores: int,
     *   storageHdd: int,
     *   networks: int,
     *   networkGatewaysEssentials: int,
     *   networkGateways: int,
     *   storageSsd: int,
     *   loadBalancersEssentials: int,
     *   loadBalancers: int,
     *   gpus: int,
     *   detachedInterfaces: int,
     *   detachedFloatingIps: int,
     *   managedObjectStorages: int,
     *   memory: int,
     *   ntpExcessGib: int,
     *   publicIpv4: int,
     *   publicIpv6: int,
     *   routers: int,
     *   storageMaxiops: int,
     *   storageStandard: int,
     *   storageTotal: int,
     *   managedDatabasesDev?: ?int,
     *   cloudServerDev1Xcpu1Gb10GbPlans?: ?int,
     *   cloudServerDev1Xcpu1GbPlans?: ?int,
     *   cloudServerStarter1Xcpu1GbPlans?: ?int,
     *   firewallRules?: ?int,
     *   serverGroups?: ?int,
     *   cdns?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->managedDatabases = $values['managedDatabases'];
        $this->managedDatabasesDev = $values['managedDatabasesDev'] ?? null;
        $this->networkPeerings = $values['networkPeerings'];
        $this->fileStorages = $values['fileStorages'];
        $this->managedContainerRegistries = $values['managedContainerRegistries'];
        $this->managedKubernetes = $values['managedKubernetes'];
        $this->tags = $values['tags'];
        $this->cores = $values['cores'];
        $this->cloudServerDev1Xcpu1Gb10GbPlans = $values['cloudServerDev1Xcpu1Gb10GbPlans'] ?? null;
        $this->cloudServerDev1Xcpu1GbPlans = $values['cloudServerDev1Xcpu1GbPlans'] ?? null;
        $this->cloudServerStarter1Xcpu1GbPlans = $values['cloudServerStarter1Xcpu1GbPlans'] ?? null;
        $this->firewallRules = $values['firewallRules'] ?? null;
        $this->serverGroups = $values['serverGroups'] ?? null;
        $this->storageHdd = $values['storageHdd'];
        $this->networks = $values['networks'];
        $this->networkGatewaysEssentials = $values['networkGatewaysEssentials'];
        $this->networkGateways = $values['networkGateways'];
        $this->storageSsd = $values['storageSsd'];
        $this->loadBalancersEssentials = $values['loadBalancersEssentials'];
        $this->loadBalancers = $values['loadBalancers'];
        $this->gpus = $values['gpus'];
        $this->detachedInterfaces = $values['detachedInterfaces'];
        $this->detachedFloatingIps = $values['detachedFloatingIps'];
        $this->managedObjectStorages = $values['managedObjectStorages'];
        $this->memory = $values['memory'];
        $this->ntpExcessGib = $values['ntpExcessGib'];
        $this->publicIpv4 = $values['publicIpv4'];
        $this->publicIpv6 = $values['publicIpv6'];
        $this->routers = $values['routers'];
        $this->storageMaxiops = $values['storageMaxiops'];
        $this->storageStandard = $values['storageStandard'];
        $this->storageTotal = $values['storageTotal'];
        $this->cdns = $values['cdns'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
