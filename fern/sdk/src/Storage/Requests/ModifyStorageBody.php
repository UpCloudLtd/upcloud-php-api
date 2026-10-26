<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\ModifyStorageBodyStorage;
use Upcloud\Core\Json\JsonProperty;

class ModifyStorageBody extends JsonSerializableType
{
    /**
     * @var ModifyStorageBodyStorage $storage Block storage properties to modify.
     */
    #[JsonProperty('storage')]
    public ModifyStorageBodyStorage $storage;

    /**
     * @param array{
     *   storage: ModifyStorageBodyStorage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }
}
