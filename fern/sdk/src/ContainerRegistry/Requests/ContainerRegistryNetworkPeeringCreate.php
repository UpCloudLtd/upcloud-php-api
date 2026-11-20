<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryNetworkPeeringCreate extends JsonSerializableType
{
    /**
     * @var string $networkUuid
     */
    #[JsonProperty('network_uuid')]
    public string $networkUuid;

    /**
     * @var string $networkCidr CIDR block of the customer network
     */
    #[JsonProperty('network_cidr')]
    public string $networkCidr;

    /**
     * @var string $zone Availability zone for the peering connection
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   networkUuid: string,
     *   networkCidr: string,
     *   zone: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->networkUuid = $values['networkUuid'];
        $this->networkCidr = $values['networkCidr'];
        $this->zone = $values['zone'];
    }
}
