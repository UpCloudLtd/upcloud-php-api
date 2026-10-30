<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for gateway tunnel details.
 */
class GatewayTunnelDetailsResponse extends JsonSerializableType
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
     * @var ?GatewayLocalPeerAddressDetailsResponse $localAddress
     */
    #[JsonProperty('local_address')]
    public ?GatewayLocalPeerAddressDetailsResponse $localAddress;

    /**
     * @var ?GatewayRemotePeerAddressDetailsResponse $remoteAddress
     */
    #[JsonProperty('remote_address')]
    public ?GatewayRemotePeerAddressDetailsResponse $remoteAddress;

    /**
     * @var ?GatewayIpsecDetailsResponse $ipsec
     */
    #[JsonProperty('ipsec')]
    public ?GatewayIpsecDetailsResponse $ipsec;

    /**
     * @var ?GatewayTunnelInternalIpDetailsResponse $tunnelInternalIp
     */
    #[JsonProperty('tunnel_internal_ip')]
    public ?GatewayTunnelInternalIpDetailsResponse $tunnelInternalIp;

    /**
     * @var ?int $internalPeerPingInterval Internal peer ping interval in seconds
     */
    #[JsonProperty('internal_peer_ping_interval')]
    public ?int $internalPeerPingInterval;

    /**
     * @var ?value-of<GatewayTunnelOperationalState> $operationalState
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?DateTime $createdAt Timestamp of when the tunnel was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the tunnel was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?bool $tunnelUp Indicates whether the tunnel is up
     */
    #[JsonProperty('tunnel_up')]
    public ?bool $tunnelUp;

    /**
     * @var ?bool $tunnelHealthy Indicates whether the tunnel is healthy
     */
    #[JsonProperty('tunnel_healthy')]
    public ?bool $tunnelHealthy;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   localAddress?: ?GatewayLocalPeerAddressDetailsResponse,
     *   remoteAddress?: ?GatewayRemotePeerAddressDetailsResponse,
     *   ipsec?: ?GatewayIpsecDetailsResponse,
     *   tunnelInternalIp?: ?GatewayTunnelInternalIpDetailsResponse,
     *   internalPeerPingInterval?: ?int,
     *   operationalState?: ?value-of<GatewayTunnelOperationalState>,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   tunnelUp?: ?bool,
     *   tunnelHealthy?: ?bool,
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
        $this->operationalState = $values['operationalState'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->tunnelUp = $values['tunnelUp'] ?? null;
        $this->tunnelHealthy = $values['tunnelHealthy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
