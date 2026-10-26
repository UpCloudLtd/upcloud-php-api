<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\StorageEncrypted;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\StorageTier;

/**
 * Parameters for the cloned block storage.
 */
class CloneStorageRequestStorage extends JsonSerializableType
{
    /**
     * @var ?value-of<StorageEncrypted> $encrypted
     */
    #[JsonProperty('encrypted')]
    public ?string $encrypted;

    /**
     * @var ?value-of<StorageTier> $tier
     */
    #[JsonProperty('tier')]
    public ?string $tier;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   title: string,
     *   zone: string,
     *   encrypted?: ?value-of<StorageEncrypted>,
     *   tier?: ?value-of<StorageTier>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->encrypted = $values['encrypted'] ?? null;
        $this->tier = $values['tier'] ?? null;
        $this->title = $values['title'];
        $this->zone = $values['zone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
