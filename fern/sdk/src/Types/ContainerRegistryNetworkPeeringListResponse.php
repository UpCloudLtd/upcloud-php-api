<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryNetworkPeeringListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryNetworkPeeringDetailResponse> $peerings List of network peering connections
     */
    #[JsonProperty('peerings'), ArrayType([ContainerRegistryNetworkPeeringDetailResponse::class])]
    public array $peerings;

    /**
     * @param array{
     *   peerings: array<ContainerRegistryNetworkPeeringDetailResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->peerings = $values['peerings'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
