<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkBooleanYesno;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class CreateNetworkRequestNetworkIpNetworksIpNetworkItemDhcpRoutesConfigurationEffectiveRoutesAutoPopulation extends JsonSerializableType
{
    /**
     * @var ?value-of<NetworkBooleanYesno> $enabled
     */
    #[JsonProperty('enabled')]
    public ?string $enabled;

    /**
     * @var ?array<string> $excludeBySource
     */
    #[JsonProperty('exclude_by_source'), ArrayType(['string'])]
    public ?array $excludeBySource;

    /**
     * @var ?array<string> $filterByDestination
     */
    #[JsonProperty('filter_by_destination'), ArrayType(['string'])]
    public ?array $filterByDestination;

    /**
     * @var ?array<string> $filterByRouteType
     */
    #[JsonProperty('filter_by_route_type'), ArrayType(['string'])]
    public ?array $filterByRouteType;

    /**
     * @param array{
     *   enabled?: ?value-of<NetworkBooleanYesno>,
     *   excludeBySource?: ?array<string>,
     *   filterByDestination?: ?array<string>,
     *   filterByRouteType?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->excludeBySource = $values['excludeBySource'] ?? null;
        $this->filterByDestination = $values['filterByDestination'] ?? null;
        $this->filterByRouteType = $values['filterByRouteType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
