<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryRegionListResponseRegionsItem extends JsonSerializableType
{
    /**
     * @var string $name Region identifier. Send this as `region` when creating a service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $primaryZone Physical UpCloud compute zone the region maps to. Use it to scope zone-specific resources such as private networks; do not send it as `region`.
     */
    #[JsonProperty('primary_zone')]
    public string $primaryZone;

    /**
     * @var array<ContainerRegistryRegionListResponseRegionsItemZonesItem> $zones Compute zones the region covers: the primary zone first, then the zones whose private networks may peer with its registries.
     */
    #[JsonProperty('zones'), ArrayType([ContainerRegistryRegionListResponseRegionsItemZonesItem::class])]
    public array $zones;

    /**
     * @var bool $allowNew Whether new registries can currently be created in this region.
     */
    #[JsonProperty('allow_new')]
    public bool $allowNew;

    /**
     * @param array{
     *   name: string,
     *   primaryZone: string,
     *   zones: array<ContainerRegistryRegionListResponseRegionsItemZonesItem>,
     *   allowNew: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->primaryZone = $values['primaryZone'];
        $this->zones = $values['zones'];
        $this->allowNew = $values['allowNew'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
