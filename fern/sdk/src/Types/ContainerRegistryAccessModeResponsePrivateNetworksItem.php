<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryAccessModeResponsePrivateNetworksItem extends JsonSerializableType
{
    /**
     * @var ?string $networkUuid
     */
    #[JsonProperty('network_uuid')]
    public ?string $networkUuid;

    /**
     * @var ?string $networkCidr CIDR block of the private network
     */
    #[JsonProperty('network_cidr')]
    public ?string $networkCidr;

    /**
     * @var ?value-of<ContainerRegistryPeeringStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   networkUuid?: ?string,
     *   networkCidr?: ?string,
     *   status?: ?value-of<ContainerRegistryPeeringStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->networkUuid = $values['networkUuid'] ?? null;
        $this->networkCidr = $values['networkCidr'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
