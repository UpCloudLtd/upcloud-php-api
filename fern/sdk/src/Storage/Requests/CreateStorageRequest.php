<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\CreateStorageRequestStorage;
use Upcloud\Core\Json\JsonProperty;

class CreateStorageRequest extends JsonSerializableType
{
    /**
     * @var CreateStorageRequestStorage $storage Block storage creation parameters.
     */
    #[JsonProperty('storage')]
    public CreateStorageRequestStorage $storage;

    /**
     * @param array{
     *   storage: CreateStorageRequestStorage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }
}
