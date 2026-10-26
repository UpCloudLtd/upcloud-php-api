<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A list of storage resources accessible to the account.
 */
class Storages extends JsonSerializableType
{
    /**
     * @var StoragesStorages $storages
     */
    #[JsonProperty('storages')]
    public StoragesStorages $storages;

    /**
     * @param array{
     *   storages: StoragesStorages,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storages = $values['storages'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
