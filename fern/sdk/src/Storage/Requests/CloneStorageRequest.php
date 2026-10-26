<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\CloneStorageRequestStorage;
use Upcloud\Core\Json\JsonProperty;

class CloneStorageRequest extends JsonSerializableType
{
    /**
     * @var CloneStorageRequestStorage $storage Parameters for the cloned block storage.
     */
    #[JsonProperty('storage')]
    public CloneStorageRequestStorage $storage;

    /**
     * @param array{
     *   storage: CloneStorageRequestStorage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }
}
