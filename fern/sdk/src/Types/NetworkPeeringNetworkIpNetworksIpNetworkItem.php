<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class NetworkPeeringNetworkIpNetworksIpNetworkItem extends JsonSerializableType
{
    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?value-of<NetworkPeeringIpFamily> $family
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @param array{
     *   address?: ?string,
     *   family?: ?value-of<NetworkPeeringIpFamily>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address = $values['address'] ?? null;
        $this->family = $values['family'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
