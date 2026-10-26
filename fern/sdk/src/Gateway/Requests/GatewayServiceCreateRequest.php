<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\GatewayServiceFeatures;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\GatewayRouterCreateRequest;
use Upcloud\Types\GatewayAddressCreateRequest;
use Upcloud\Types\GatewayConnectionCreateRequest;
use Upcloud\Types\GatewayLabelCreateRequest;
use Upcloud\Types\GatewayServiceConfiguredStatus;

class GatewayServiceCreateRequest extends JsonSerializableType
{
    /**
     * @var string $name Name of the service
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $plan Plan
     */
    #[JsonProperty('plan')]
    public string $plan;

    /**
     * @var string $zone Zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var array<value-of<GatewayServiceFeatures>> $features Active features
     */
    #[JsonProperty('features'), ArrayType(['string'])]
    public array $features;

    /**
     * @var array<GatewayRouterCreateRequest> $routers Service routers
     */
    #[JsonProperty('routers'), ArrayType([GatewayRouterCreateRequest::class])]
    public array $routers;

    /**
     * @var ?array<GatewayAddressCreateRequest> $addresses Service addresses
     */
    #[JsonProperty('addresses'), ArrayType([GatewayAddressCreateRequest::class])]
    public ?array $addresses;

    /**
     * @var ?array<GatewayConnectionCreateRequest> $connections Service connections
     */
    #[JsonProperty('connections'), ArrayType([GatewayConnectionCreateRequest::class])]
    public ?array $connections;

    /**
     * @var ?array<GatewayLabelCreateRequest> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([GatewayLabelCreateRequest::class])]
    public ?array $labels;

    /**
     * @var value-of<GatewayServiceConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var ?bool $automaticTunnelInternalIpAllocation Allocate and use tunnel internal IPs automatically
     */
    #[JsonProperty('automatic_tunnel_internal_ip_allocation')]
    public ?bool $automaticTunnelInternalIpAllocation;

    /**
     * @param array{
     *   name: string,
     *   plan: string,
     *   zone: string,
     *   features: array<value-of<GatewayServiceFeatures>>,
     *   routers: array<GatewayRouterCreateRequest>,
     *   configuredStatus: value-of<GatewayServiceConfiguredStatus>,
     *   addresses?: ?array<GatewayAddressCreateRequest>,
     *   connections?: ?array<GatewayConnectionCreateRequest>,
     *   labels?: ?array<GatewayLabelCreateRequest>,
     *   automaticTunnelInternalIpAllocation?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->plan = $values['plan'];
        $this->zone = $values['zone'];
        $this->features = $values['features'];
        $this->routers = $values['routers'];
        $this->addresses = $values['addresses'] ?? null;
        $this->connections = $values['connections'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->configuredStatus = $values['configuredStatus'];
        $this->automaticTunnelInternalIpAllocation = $values['automaticTunnelInternalIpAllocation'] ?? null;
    }
}
