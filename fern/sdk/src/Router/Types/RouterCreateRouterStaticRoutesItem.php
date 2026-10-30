<?php

namespace Upcloud\Router\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class RouterCreateRouterStaticRoutesItem extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var (
     *    string
     *   |value-of<RouterCreateRouterStaticRoutesItemNexthopOne>
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
     * @param array{
     *   nexthop: (
     *    string
     *   |value-of<RouterCreateRouterStaticRoutesItemNexthopOne>
     * ),
     *   route: string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->nexthop = $values['nexthop'];
        $this->route = $values['route'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
