<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Router describes a virtual router that can route between SDN networks
 */
class RouterDetails extends JsonSerializableType
{
    /**
     * @var array<RouterDetailsAttachedNetworkGatewaysItem> $attachedNetworkGateways Gateways of the networks attached to the router.
     */
    #[JsonProperty('attached_network_gateways'), ArrayType([RouterDetailsAttachedNetworkGatewaysItem::class])]
    public array $attachedNetworkGateways;

    /**
     * @var RouterDetailsAttachedNetworks $attachedNetworks Networks attached to the router.
     */
    #[JsonProperty('attached_networks')]
    public RouterDetailsAttachedNetworks $attachedNetworks;

    /**
     * @var array<RouterLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([RouterLabel::class])]
    public array $labels;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<RouterRouteNexthop> $staticRoutes
     */
    #[JsonProperty('static_routes'), ArrayType([RouterRouteNexthop::class])]
    public array $staticRoutes;

    /**
     * @var value-of<RouterType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @param array{
     *   attachedNetworkGateways: array<RouterDetailsAttachedNetworkGatewaysItem>,
     *   attachedNetworks: RouterDetailsAttachedNetworks,
     *   labels: array<RouterLabel>,
     *   name: string,
     *   staticRoutes: array<RouterRouteNexthop>,
     *   type: value-of<RouterType>,
     *   uuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attachedNetworkGateways = $values['attachedNetworkGateways'];
        $this->attachedNetworks = $values['attachedNetworks'];
        $this->labels = $values['labels'];
        $this->name = $values['name'];
        $this->staticRoutes = $values['staticRoutes'];
        $this->type = $values['type'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
