<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for bucket details.
 */
class ObjectStorage2BucketDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

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
     * @var ?bool $deleted
     */
    #[JsonProperty('deleted')]
    public ?bool $deleted;

    /**
     * @param array{
     *   name?: ?string,
     *   totalObjects?: ?int,
     *   totalSizeBytes?: ?int,
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->totalObjects = $values['totalObjects'] ?? null;
        $this->totalSizeBytes = $values['totalSizeBytes'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
