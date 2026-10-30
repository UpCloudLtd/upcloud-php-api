<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a load balancer service instance that groups together frontends, backends, and related agents. It defines the service plan, network configuration, and operational state across all nodes.
 */
class LoadBalancerService extends JsonSerializableType
{
    /**
     * @var string $uuid Unique identifier of the service.
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $name Human-readable name assigned to the service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $zone UpCloud zone where the service is deployed.
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var string $plan Selected load balancer plan defining node size, performance, and pricing tier.
     */
    #[JsonProperty('plan')]
    public string $plan;

    /**
     * @var string $configuredStatus Configuration status of the service (e.g., whether all components are correctly provisioned).
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var ?value-of<LoadBalancerServiceOperationalState> $operationalState Current operational state of the service, describing its runtime behavior and availability.
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?array<LoadBalancerFrontend> $frontends List of frontend configurations associated with the service.
     */
    #[JsonProperty('frontends'), ArrayType([LoadBalancerFrontend::class])]
    public ?array $frontends;

    /**
     * @var ?array<LoadBalancerBackend> $backends List of backend configurations linked to this service.
     */
    #[JsonProperty('backends'), ArrayType([LoadBalancerBackend::class])]
    public ?array $backends;

    /**
     * @var ?array<LoadBalancerResolver> $resolvers DNS resolvers available for this service.
     */
    #[JsonProperty('resolvers'), ArrayType([LoadBalancerResolver::class])]
    public ?array $resolvers;

    /**
     * @var ?array<LoadBalancerNetwork> $networks Networks attached to this service.
     */
    #[JsonProperty('networks'), ArrayType([LoadBalancerNetwork::class])]
    public ?array $networks;

    /**
     * @var ?array<LoadBalancerIpAddress> $ipAddresses IP addresses assigned to this service.
     */
    #[JsonProperty('ip_addresses'), ArrayType([LoadBalancerIpAddress::class])]
    public ?array $ipAddresses;

    /**
     * @var ?array<LoadBalancerLabelResponse> $labels Labels associated with the service for metadata tagging and identification.
     */
    #[JsonProperty('labels'), ArrayType([LoadBalancerLabelResponse::class])]
    public ?array $labels;

    /**
     * @var ?value-of<LoadBalancerServiceMaintenanceDow> $maintenanceDow Day of week scheduled for maintenance operations.
     */
    #[JsonProperty('maintenance_dow')]
    public ?string $maintenanceDow;

    /**
     * @var ?string $maintenanceTime Time of day (in UTC) scheduled for maintenance operations.
     */
    #[JsonProperty('maintenance_time')]
    public ?string $maintenanceTime;

    /**
     * @var DateTime $createdAt Timestamp when the service was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the service was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?string $networkUuid Deprecated: old field replaced by the networks array.
     */
    #[JsonProperty('network_uuid')]
    public ?string $networkUuid;

    /**
     * @var ?string $dnsName Deprecated: legacy DNS field replaced by service-level IP addressing.
     */
    #[JsonProperty('dns_name')]
    public ?string $dnsName;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   zone: string,
     *   plan: string,
     *   configuredStatus: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   operationalState?: ?value-of<LoadBalancerServiceOperationalState>,
     *   frontends?: ?array<LoadBalancerFrontend>,
     *   backends?: ?array<LoadBalancerBackend>,
     *   resolvers?: ?array<LoadBalancerResolver>,
     *   networks?: ?array<LoadBalancerNetwork>,
     *   ipAddresses?: ?array<LoadBalancerIpAddress>,
     *   labels?: ?array<LoadBalancerLabelResponse>,
     *   maintenanceDow?: ?value-of<LoadBalancerServiceMaintenanceDow>,
     *   maintenanceTime?: ?string,
     *   networkUuid?: ?string,
     *   dnsName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->zone = $values['zone'];
        $this->plan = $values['plan'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->operationalState = $values['operationalState'] ?? null;
        $this->frontends = $values['frontends'] ?? null;
        $this->backends = $values['backends'] ?? null;
        $this->resolvers = $values['resolvers'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->ipAddresses = $values['ipAddresses'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->maintenanceDow = $values['maintenanceDow'] ?? null;
        $this->maintenanceTime = $values['maintenanceTime'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->networkUuid = $values['networkUuid'] ?? null;
        $this->dnsName = $values['dnsName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
