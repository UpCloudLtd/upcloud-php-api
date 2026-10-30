<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network gateway VPN connection tunnel
 */
class GatewayTunnelCreateRequest extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var string $name Name of the tunnel
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var GatewayTunnelCreateRequestLocalAddress $localAddress Local peer address
     */
    #[JsonProperty('local_address')]
    public GatewayTunnelCreateRequestLocalAddress $localAddress;

    /**
     * @var GatewayTunnelCreateRequestRemoteAddress $remoteAddress Remote peer address
     */
    #[JsonProperty('remote_address')]
    public GatewayTunnelCreateRequestRemoteAddress $remoteAddress;

    /**
     * @var GatewayTunnelCreateRequestIpsec $ipsec IPsec configuration
     */
    #[JsonProperty('ipsec')]
    public GatewayTunnelCreateRequestIpsec $ipsec;

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
     *   name: string,
     *   localAddress: GatewayTunnelCreateRequestLocalAddress,
     *   remoteAddress: GatewayTunnelCreateRequestRemoteAddress,
     *   ipsec: GatewayTunnelCreateRequestIpsec,
     *   uuid?: ?string,
     *   tunnelInternalIp?: ?string,
     *   internalPeerPingInterval?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'];
        $this->localAddress = $values['localAddress'];
        $this->remoteAddress = $values['remoteAddress'];
        $this->ipsec = $values['ipsec'];
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
