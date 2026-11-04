<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountProfileStorageAccess extends JsonSerializableType
{
    /**
     * @var array<string> $storage
     */
    #[JsonProperty('storage'), ArrayType(['string'])]
    public array $storage;

    /**
     * @param array{
     *   storage: array<string>,
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
