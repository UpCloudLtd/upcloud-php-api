<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\GatewayServiceFeatures;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\GatewayServiceConfiguredStatus;
use Upcloud\Types\GatewayConnectionModifyRequest;
use Upcloud\Types\GatewayLabelCreateRequest;

class GatewayServiceModifyRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the service
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<value-of<GatewayServiceFeatures>> $features Active features
     */
    #[JsonProperty('features'), ArrayType(['string'])]
    public ?array $features;

    /**
     * @var ?string $plan Plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?value-of<GatewayServiceConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?array<GatewayConnectionModifyRequest> $connections Service connections
     */
    #[JsonProperty('connections'), ArrayType([GatewayConnectionModifyRequest::class])]
    public ?array $connections;

    /**
     * @var ?array<GatewayLabelCreateRequest> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([GatewayLabelCreateRequest::class])]
    public ?array $labels;

    /**
     * @var ?bool $automaticTunnelInternalIpAllocation Allocate and use tunnel internal IPs automatically
     */
    #[JsonProperty('automatic_tunnel_internal_ip_allocation')]
    public ?bool $automaticTunnelInternalIpAllocation;

    /**
     * @param array{
     *   name?: ?string,
     *   features?: ?array<value-of<GatewayServiceFeatures>>,
     *   plan?: ?string,
     *   configuredStatus?: ?value-of<GatewayServiceConfiguredStatus>,
     *   connections?: ?array<GatewayConnectionModifyRequest>,
     *   labels?: ?array<GatewayLabelCreateRequest>,
     *   automaticTunnelInternalIpAllocation?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->features = $values['features'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->connections = $values['connections'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->automaticTunnelInternalIpAllocation = $values['automaticTunnelInternalIpAllocation'] ?? null;
    }
}
