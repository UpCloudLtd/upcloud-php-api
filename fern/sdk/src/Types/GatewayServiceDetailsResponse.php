<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Gateway service
 */
class GatewayServiceDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name Name of the service
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $zone Zone of the service
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @var ?string $plan Plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?array<value-of<GatewayServiceFeatures>> $features Active features
     */
    #[JsonProperty('features'), ArrayType(['string'])]
    public ?array $features;

    /**
     * @var ?GatewayRouterDetailsResponse $routers
     */
    #[JsonProperty('routers')]
    public ?GatewayRouterDetailsResponse $routers;

    /**
     * @var ?array<GatewayAddressDetailsResponse> $addresses
     */
    #[JsonProperty('addresses'), ArrayType([GatewayAddressDetailsResponse::class])]
    public ?array $addresses;

    /**
     * @var ?array<GatewayConnectionDetailsResponse> $connections
     */
    #[JsonProperty('connections'), ArrayType([GatewayConnectionDetailsResponse::class])]
    public ?array $connections;

    /**
     * @var ?value-of<GatewayServiceConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?value-of<GatewayServiceOperationalState> $operationalState
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?bool $automaticTunnelInternalIpAllocation Allocate and use tunnel internal IPs automatically
     */
    #[JsonProperty('automatic_tunnel_internal_ip_allocation')]
    public ?bool $automaticTunnelInternalIpAllocation;

    /**
     * @var ?array<GatewayLabelDetailsResponse> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([GatewayLabelDetailsResponse::class])]
    public ?array $labels;

    /**
     * @var ?DateTime $createdAt Timestamp of when the service was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the service was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   zone?: ?string,
     *   plan?: ?string,
     *   features?: ?array<value-of<GatewayServiceFeatures>>,
     *   routers?: ?GatewayRouterDetailsResponse,
     *   addresses?: ?array<GatewayAddressDetailsResponse>,
     *   connections?: ?array<GatewayConnectionDetailsResponse>,
     *   configuredStatus?: ?value-of<GatewayServiceConfiguredStatus>,
     *   operationalState?: ?value-of<GatewayServiceOperationalState>,
     *   automaticTunnelInternalIpAllocation?: ?bool,
     *   labels?: ?array<GatewayLabelDetailsResponse>,
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
        $this->plan = $values['plan'] ?? null;
        $this->features = $values['features'] ?? null;
        $this->routers = $values['routers'] ?? null;
        $this->addresses = $values['addresses'] ?? null;
        $this->connections = $values['connections'] ?? null;
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->operationalState = $values['operationalState'] ?? null;
        $this->automaticTunnelInternalIpAllocation = $values['automaticTunnelInternalIpAllocation'] ?? null;
        $this->labels = $values['labels'] ?? null;
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
