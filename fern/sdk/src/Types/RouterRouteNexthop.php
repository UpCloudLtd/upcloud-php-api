<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Static route with nexthop information.
 */
class RouterRouteNexthop extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    string
     *   |value-of<RouterRouteNexthopNexthopOne>
     * ) $nexthop
     */
    #[JsonProperty('nexthop')]
    public string $nexthop;

    /**
     * @var string $route
     */
    #[JsonProperty('route')]
    public string $route;

    /**
     * @var value-of<RouterStaticRouteType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   name: string,
     *   nexthop: (
     *    string
     *   |value-of<RouterRouteNexthopNexthopOne>
     * ),
     *   route: string,
     *   type: value-of<RouterStaticRouteType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->nexthop = $values['nexthop'];
        $this->route = $values['route'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
