<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class StoragesStorages extends JsonSerializableType
{
    /**
     * @var array<StorageListItem> $storage
     */
    #[JsonProperty('storage'), ArrayType([StorageListItem::class])]
    public array $storage;

    /**
     * @param array{
     *   storage: array<StorageListItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
