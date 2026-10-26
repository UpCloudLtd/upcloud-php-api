<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\LoadBalancerServiceConfiguredStatus;
use Upcloud\Types\LoadBalancerFrontendCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\LoadBalancerBackendCreate;
use Upcloud\Types\LoadBalancerResolverCreate;
use Upcloud\Types\LoadBalancerNetworkCreate;
use Upcloud\Types\LoadBalancerLabelCreate;
use Upcloud\Types\LoadBalancerMaintenanceDayOfWeek;
use Upcloud\Types\LoadBalancerIpAddressCreate;

class LoadBalancerServiceCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the service
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $zone Zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var string $plan Plan
     */
    #[JsonProperty('plan')]
    public string $plan;

    /**
     * @var value-of<LoadBalancerServiceConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var array<LoadBalancerFrontendCreate> $frontends Service frontends
     */
    #[JsonProperty('frontends'), ArrayType([LoadBalancerFrontendCreate::class])]
    public array $frontends;

    /**
     * @var ?array<LoadBalancerBackendCreate> $backends Service backends
     */
    #[JsonProperty('backends'), ArrayType([LoadBalancerBackendCreate::class])]
    public ?array $backends;

    /**
     * @var ?array<LoadBalancerResolverCreate> $resolvers Service resolvers
     */
    #[JsonProperty('resolvers'), ArrayType([LoadBalancerResolverCreate::class])]
    public ?array $resolvers;

    /**
     * @var ?string $networkUuid Private Network UUID
     */
    #[JsonProperty('network_uuid')]
    public ?string $networkUuid;

    /**
     * @var ?array<LoadBalancerNetworkCreate> $networks Service networks
     */
    #[JsonProperty('networks'), ArrayType([LoadBalancerNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<LoadBalancerLabelCreate> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([LoadBalancerLabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?value-of<LoadBalancerMaintenanceDayOfWeek> $maintenanceDow
     */
    #[JsonProperty('maintenance_dow')]
    public ?string $maintenanceDow;

    /**
     * @var ?string $maintenanceTime
     */
    #[JsonProperty('maintenance_time')]
    public ?string $maintenanceTime;

    /**
     * @var ?array<LoadBalancerIpAddressCreate> $ipAddresses List of IP addresses for the network
     */
    #[JsonProperty('ip_addresses'), ArrayType([LoadBalancerIpAddressCreate::class])]
    public ?array $ipAddresses;

    /**
     * @param array{
     *   name: string,
     *   zone: string,
     *   plan: string,
     *   configuredStatus: value-of<LoadBalancerServiceConfiguredStatus>,
     *   frontends: array<LoadBalancerFrontendCreate>,
     *   backends?: ?array<LoadBalancerBackendCreate>,
     *   resolvers?: ?array<LoadBalancerResolverCreate>,
     *   networkUuid?: ?string,
     *   networks?: ?array<LoadBalancerNetworkCreate>,
     *   labels?: ?array<LoadBalancerLabelCreate>,
     *   maintenanceDow?: ?value-of<LoadBalancerMaintenanceDayOfWeek>,
     *   maintenanceTime?: ?string,
     *   ipAddresses?: ?array<LoadBalancerIpAddressCreate>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->zone = $values['zone'];
        $this->plan = $values['plan'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->frontends = $values['frontends'];
        $this->backends = $values['backends'] ?? null;
        $this->resolvers = $values['resolvers'] ?? null;
        $this->networkUuid = $values['networkUuid'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->maintenanceDow = $values['maintenanceDow'] ?? null;
        $this->maintenanceTime = $values['maintenanceTime'] ?? null;
        $this->ipAddresses = $values['ipAddresses'] ?? null;
    }
}
