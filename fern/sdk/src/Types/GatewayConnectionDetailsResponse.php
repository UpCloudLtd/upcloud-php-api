<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for gateway connection details.
 */
class GatewayConnectionDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name Name of the connection
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<GatewayConnectionType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<GatewayConnectionRouteDetailsResponse> $localRoutes Local routes for the connection
     */
    #[JsonProperty('local_routes'), ArrayType([GatewayConnectionRouteDetailsResponse::class])]
    public ?array $localRoutes;

    /**
     * @var ?array<GatewayConnectionRouteDetailsResponse> $remoteRoutes Remote routes for the connection
     */
    #[JsonProperty('remote_routes'), ArrayType([GatewayConnectionRouteDetailsResponse::class])]
    public ?array $remoteRoutes;

    /**
     * @var ?array<GatewayTunnelDetailsResponse> $tunnels
     */
    #[JsonProperty('tunnels'), ArrayType([GatewayTunnelDetailsResponse::class])]
    public ?array $tunnels;

    /**
     * @var ?DateTime $createdAt Timestamp of when the connection was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the connection was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   type?: ?value-of<GatewayConnectionType>,
     *   localRoutes?: ?array<GatewayConnectionRouteDetailsResponse>,
     *   remoteRoutes?: ?array<GatewayConnectionRouteDetailsResponse>,
     *   tunnels?: ?array<GatewayTunnelDetailsResponse>,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->localRoutes = $values['localRoutes'] ?? null;
        $this->remoteRoutes = $values['remoteRoutes'] ?? null;
        $this->tunnels = $values['tunnels'] ?? null;
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
