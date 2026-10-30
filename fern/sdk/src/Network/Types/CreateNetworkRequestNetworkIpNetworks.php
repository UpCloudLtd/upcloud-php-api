<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class CreateNetworkRequestNetworkIpNetworks extends JsonSerializableType
{
    /**
     * @var array<CreateNetworkRequestNetworkIpNetworksIpNetworkItem> $ipNetwork
     */
    #[JsonProperty('ip_network'), ArrayType([CreateNetworkRequestNetworkIpNetworksIpNetworkItem::class])]
    public array $ipNetwork;

    /**
     * @param array{
     *   ipNetwork: array<CreateNetworkRequestNetworkIpNetworksIpNetworkItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipNetwork = $values['ipNetwork'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
