<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Storage choices for this compute shape: the distinct base sizes with the total each scales to, plus the shared dynamic-storage rules. Null for shapes without customer storage.
 */
class DatabasePlansResponseServiceTypesItemComputeShapesItemStorage extends JsonSerializableType
{
    /**
     * @var int $stepGib Granularity, in GiB, at which dynamic storage can be adjusted.
     */
    #[JsonProperty('step_gib')]
    public int $stepGib;

    /**
     * @var int $dynamicMaxMultiplier Maximum multiplier applied to a base size when scaling storage dynamically.
     */
    #[JsonProperty('dynamic_max_multiplier')]
    public int $dynamicMaxMultiplier;

    /**
     * @var ?int $totalCapGib Hard ceiling on base plus dynamic storage, in GiB, or null when the engine enforces no fixed total cap.
     */
    #[JsonProperty('total_cap_gib')]
    public ?int $totalCapGib;

    /**
     * @var array<DatabasePlansResponseServiceTypesItemComputeShapesItemStorageOptionsItem> $options Base-storage options offered for this compute shape.
     */
    #[JsonProperty('options'), ArrayType([DatabasePlansResponseServiceTypesItemComputeShapesItemStorageOptionsItem::class])]
    public array $options;

    /**
     * @param array{
     *   stepGib: int,
     *   dynamicMaxMultiplier: int,
     *   options: array<DatabasePlansResponseServiceTypesItemComputeShapesItemStorageOptionsItem>,
     *   totalCapGib?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stepGib = $values['stepGib'];
        $this->dynamicMaxMultiplier = $values['dynamicMaxMultiplier'];
        $this->totalCapGib = $values['totalCapGib'] ?? null;
        $this->options = $values['options'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
