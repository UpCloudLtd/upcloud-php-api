<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for gateway plan details.
 */
class GatewayPlanDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the plan
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $serverNumber Number of nodes
     */
    #[JsonProperty('server_number')]
    public ?int $serverNumber;

    /**
     * @var ?int $perGatewayMaxConnections Per gateway (agent node server) maximum conntrack connections
     */
    #[JsonProperty('per_gateway_max_connections')]
    public ?int $perGatewayMaxConnections;

    /**
     * @var ?array<value-of<GatewayServiceFeatures>> $supportedFeatures
     */
    #[JsonProperty('supported_features'), ArrayType(['string'])]
    public ?array $supportedFeatures;

    /**
     * @var ?int $vpnTunnelAmount Number of VPN tunnels this plan allows.
     */
    #[JsonProperty('vpn_tunnel_amount')]
    public ?int $vpnTunnelAmount;

    /**
     * @var ?int $perGatewayBandwidthMbps Per gateway (agent node server) bandwidth in megabits per second.
     */
    #[JsonProperty('per_gateway_bandwidth_mbps')]
    public ?int $perGatewayBandwidthMbps;

    /**
     * @var ?int $perGatewayMaximumVpnBandwidthMbps Per gateway (agent node server) maximum vpn bandwidth in megabits per second.
     */
    #[JsonProperty('per_gateway_maximum_vpn_bandwidth_mbps')]
    public ?int $perGatewayMaximumVpnBandwidthMbps;

    /**
     * @param array{
     *   name?: ?string,
     *   serverNumber?: ?int,
     *   perGatewayMaxConnections?: ?int,
     *   supportedFeatures?: ?array<value-of<GatewayServiceFeatures>>,
     *   vpnTunnelAmount?: ?int,
     *   perGatewayBandwidthMbps?: ?int,
     *   perGatewayMaximumVpnBandwidthMbps?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->serverNumber = $values['serverNumber'] ?? null;
        $this->perGatewayMaxConnections = $values['perGatewayMaxConnections'] ?? null;
        $this->supportedFeatures = $values['supportedFeatures'] ?? null;
        $this->vpnTunnelAmount = $values['vpnTunnelAmount'] ?? null;
        $this->perGatewayBandwidthMbps = $values['perGatewayBandwidthMbps'] ?? null;
        $this->perGatewayMaximumVpnBandwidthMbps = $values['perGatewayMaximumVpnBandwidthMbps'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
