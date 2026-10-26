<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2ServiceDetailResponseUsage extends JsonSerializableType
{
    /**
     * @var ?int $totalSizeBytes
     */
    #[JsonProperty('total_size_bytes')]
    public ?int $totalSizeBytes;

    /**
     * @var ?int $totalObjects
     */
    #[JsonProperty('total_objects')]
    public ?int $totalObjects;

    /**
     * @param array{
     *   totalSizeBytes?: ?int,
     *   totalObjects?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalSizeBytes = $values['totalSizeBytes'] ?? null;
        $this->totalObjects = $values['totalObjects'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
