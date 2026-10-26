<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Container object for network items.
 */
class NetworksNetworks extends JsonSerializableType
{
    /**
     * @var array<NetworkDetails> $network
     */
    #[JsonProperty('network'), ArrayType([NetworkDetails::class])]
    public array $network;

    /**
     * @param array{
     *   network: array<NetworkDetails>,
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
