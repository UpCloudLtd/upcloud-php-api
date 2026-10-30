<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network gateway VPN connection route
 */
class GatewayConnectionRouteRequest extends JsonSerializableType
{
    /**
     * @var string $name Route name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<GatewayConnectionRouteType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $staticNetwork Static network subnet
     */
    #[JsonProperty('static_network')]
    public string $staticNetwork;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<GatewayConnectionRouteType>,
     *   staticNetwork: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->type = $values['type'];
        $this->staticNetwork = $values['staticNetwork'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
