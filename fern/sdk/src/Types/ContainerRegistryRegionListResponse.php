<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Regions a container registry can be created in. `name` is the value to send as `region` when creating a service; it is not the same as a zone.
 */
class ContainerRegistryRegionListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryRegionListResponseRegionsItem> $regions
     */
    #[JsonProperty('regions'), ArrayType([ContainerRegistryRegionListResponseRegionsItem::class])]
    public array $regions;

    /**
     * @param array{
     *   regions: array<ContainerRegistryRegionListResponseRegionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->regions = $values['regions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
