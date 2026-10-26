<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\GatewayServiceConfiguredStatus;
use Upcloud\Types\GatewayLabelCreateRequest;
use Upcloud\Core\Types\ArrayType;

class GatewayServiceReplaceRequest extends JsonSerializableType
{
    /**
     * @var string $name Name of the service
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $plan Plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var value-of<GatewayServiceConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var mixed $connections Service connections
     */
    #[JsonProperty('connections')]
    public mixed $connections;

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
     *   name: string,
     *   configuredStatus: value-of<GatewayServiceConfiguredStatus>,
     *   plan?: ?string,
     *   connections?: mixed,
     *   labels?: ?array<GatewayLabelCreateRequest>,
     *   automaticTunnelInternalIpAllocation?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->plan = $values['plan'] ?? null;
        $this->configuredStatus = $values['configuredStatus'];
        $this->connections = $values['connections'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->automaticTunnelInternalIpAllocation = $values['automaticTunnelInternalIpAllocation'] ?? null;
    }
}
