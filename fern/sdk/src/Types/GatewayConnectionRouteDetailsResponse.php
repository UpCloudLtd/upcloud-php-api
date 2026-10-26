<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for gateway connection route details.
 */
class GatewayConnectionRouteDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the connection
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<GatewayConnectionRouteType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $staticNetwork Static network for the connection route
     */
    #[JsonProperty('static_network')]
    public ?string $staticNetwork;

    /**
     * @param array{
     *   name?: ?string,
     *   type?: ?value-of<GatewayConnectionRouteType>,
     *   staticNetwork?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->staticNetwork = $values['staticNetwork'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
