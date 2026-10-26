<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfiguration extends JsonSerializableType
{
    /**
     * @var ?CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfigurationEffectiveRoutesAutoPopulation $effectiveRoutesAutoPopulation
     */
    #[JsonProperty('effective_routes_auto_population')]
    public ?CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfigurationEffectiveRoutesAutoPopulation $effectiveRoutesAutoPopulation;

    /**
     * @param array{
     *   effectiveRoutesAutoPopulation?: ?CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfigurationEffectiveRoutesAutoPopulation,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->effectiveRoutesAutoPopulation = $values['effectiveRoutesAutoPopulation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
