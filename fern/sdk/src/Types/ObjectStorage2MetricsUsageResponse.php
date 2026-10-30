<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for service usage metrics.
 */
class ObjectStorage2MetricsUsageResponse extends JsonSerializableType
{
    /**
     * @var ?int $totalObjects
     */
    #[JsonProperty('total_objects')]
    public ?int $totalObjects;

    /**
     * @var ?int $totalSizeBytes
     */
    #[JsonProperty('total_size_bytes')]
    public ?int $totalSizeBytes;

    /**
     * @param array{
     *   totalObjects?: ?int,
     *   totalSizeBytes?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalObjects = $values['totalObjects'] ?? null;
        $this->totalSizeBytes = $values['totalSizeBytes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
