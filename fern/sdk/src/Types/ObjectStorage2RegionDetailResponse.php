<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for detailed information about a specific region.
 */
class ObjectStorage2RegionDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $primaryZone
     */
    #[JsonProperty('primary_zone')]
    public ?string $primaryZone;

    /**
     * @var ?array<ObjectStorage2RegionDetailResponseZonesItem> $zones
     */
    #[JsonProperty('zones'), ArrayType([ObjectStorage2RegionDetailResponseZonesItem::class])]
    public ?array $zones;

    /**
     * @param array{
     *   name?: ?string,
     *   primaryZone?: ?string,
     *   zones?: ?array<ObjectStorage2RegionDetailResponseZonesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->primaryZone = $values['primaryZone'] ?? null;
        $this->zones = $values['zones'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
