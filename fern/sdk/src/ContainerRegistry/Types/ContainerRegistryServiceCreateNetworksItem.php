<?php

namespace Upcloud\ContainerRegistry\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryServiceCreateNetworksItem extends JsonSerializableType
{
    /**
     * @var string $networkUuid
     */
    #[JsonProperty('network_uuid')]
    public string $networkUuid;

    /**
     * @var string $networkCidr
     */
    #[JsonProperty('network_cidr')]
    public string $networkCidr;

    /**
     * @var string $zone
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
