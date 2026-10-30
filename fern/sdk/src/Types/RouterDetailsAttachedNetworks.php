<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Networks attached to the router.
 */
class RouterDetailsAttachedNetworks extends JsonSerializableType
{
    /**
     * @var array<RouterDetailsAttachedNetworksNetworkItem> $network
     */
    #[JsonProperty('network'), ArrayType([RouterDetailsAttachedNetworksNetworkItem::class])]
    public array $network;

    /**
     * @param array{
     *   network: array<RouterDetailsAttachedNetworksNetworkItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->network = $values['network'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
