<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Request to modify a VPN tunnel
 */
class GatewayTunnelModifyRequest extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name Name of the tunnel
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?GatewayTunnelModifyRequestLocalAddress $localAddress Local peer address
     */
    #[JsonProperty('local_address')]
    public ?GatewayTunnelModifyRequestLocalAddress $localAddress;

    /**
     * @var ?GatewayTunnelModifyRequestRemoteAddress $remoteAddress Remote peer address
     */
    #[JsonProperty('remote_address')]
    public ?GatewayTunnelModifyRequestRemoteAddress $remoteAddress;

    /**
     * @var ?GatewayTunnelModifyRequestIpsec $ipsec IPsec configuration
     */
    #[JsonProperty('ipsec')]
    public ?GatewayTunnelModifyRequestIpsec $ipsec;

    /**
     * @var ?string $tunnelInternalIp Tunnel internal IP address, "" if disabled
     */
    #[JsonProperty('tunnel_internal_ip')]
    public ?string $tunnelInternalIp;

    /**
     * @var ?int $internalPeerPingInterval Internal peer ping interval in seconds, or zero if disabled
     */
    #[JsonProperty('internal_peer_ping_interval')]
    public ?int $internalPeerPingInterval;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   localAddress?: ?GatewayTunnelModifyRequestLocalAddress,
     *   remoteAddress?: ?GatewayTunnelModifyRequestRemoteAddress,
     *   ipsec?: ?GatewayTunnelModifyRequestIpsec,
     *   tunnelInternalIp?: ?string,
     *   internalPeerPingInterval?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->localAddress = $values['localAddress'] ?? null;
        $this->remoteAddress = $values['remoteAddress'] ?? null;
        $this->ipsec = $values['ipsec'] ?? null;
        $this->tunnelInternalIp = $values['tunnelInternalIp'] ?? null;
        $this->internalPeerPingInterval = $values['internalPeerPingInterval'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
