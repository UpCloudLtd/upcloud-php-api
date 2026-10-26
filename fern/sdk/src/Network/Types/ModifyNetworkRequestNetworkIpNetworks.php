<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ModifyNetworkRequestNetworkIpNetworks extends JsonSerializableType
{
    /**
     * @var array<ModifyNetworkRequestNetworkIpNetworksIpNetworkItem> $ipNetwork
     */
    #[JsonProperty('ip_network'), ArrayType([ModifyNetworkRequestNetworkIpNetworksIpNetworkItem::class])]
    public array $ipNetwork;

    /**
     * @param array{
     *   ipNetwork: array<ModifyNetworkRequestNetworkIpNetworksIpNetworkItem>,
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
