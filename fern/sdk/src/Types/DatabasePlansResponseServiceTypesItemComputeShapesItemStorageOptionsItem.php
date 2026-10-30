<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabasePlansResponseServiceTypesItemComputeShapesItemStorageOptionsItem extends JsonSerializableType
{
    /**
     * @var int $baseGib Base storage size, in GiB.
     */
    #[JsonProperty('base_gib')]
    public int $baseGib;

    /**
     * @var int $maxGib Largest total storage reachable from this base via dynamic storage (base plus multiplier times base), capped at total_cap_gib where it applies.
     */
    #[JsonProperty('max_gib')]
    public int $maxGib;

    /**
     * @param array{
     *   baseGib: int,
     *   maxGib: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->baseGib = $values['baseGib'];
        $this->maxGib = $values['maxGib'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
