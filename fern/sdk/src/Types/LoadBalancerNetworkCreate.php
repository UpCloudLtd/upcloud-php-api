<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Load Balancer Network.
 */
class LoadBalancerNetworkCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the network
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $uuid Network UUID
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var value-of<LoadBalancerNetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<LoadBalancerNetworkFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<LoadBalancerNetworkType>,
     *   family: value-of<LoadBalancerNetworkFamily>,
     *   uuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->uuid = $values['uuid'] ?? null;
        $this->type = $values['type'];
        $this->family = $values['family'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
