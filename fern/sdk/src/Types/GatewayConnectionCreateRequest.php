<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Network gateway VPN connection
 */
class GatewayConnectionCreateRequest extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var string $name Name of the connection
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<GatewayConnectionType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?array<GatewayConnectionRouteRequest> $localRoutes Connection local routes
     */
    #[JsonProperty('local_routes'), ArrayType([GatewayConnectionRouteRequest::class])]
    public ?array $localRoutes;

    /**
     * @var ?array<GatewayConnectionRouteRequest> $remoteRoutes Connection remote routes
     */
    #[JsonProperty('remote_routes'), ArrayType([GatewayConnectionRouteRequest::class])]
    public ?array $remoteRoutes;

    /**
     * @var ?array<GatewayTunnelCreateRequest> $tunnels Connection tunnels
     */
    #[JsonProperty('tunnels'), ArrayType([GatewayTunnelCreateRequest::class])]
    public ?array $tunnels;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<GatewayConnectionType>,
     *   uuid?: ?string,
     *   localRoutes?: ?array<GatewayConnectionRouteRequest>,
     *   remoteRoutes?: ?array<GatewayConnectionRouteRequest>,
     *   tunnels?: ?array<GatewayTunnelCreateRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'];
        $this->type = $values['type'];
        $this->localRoutes = $values['localRoutes'] ?? null;
        $this->remoteRoutes = $values['remoteRoutes'] ?? null;
        $this->tunnels = $values['tunnels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
