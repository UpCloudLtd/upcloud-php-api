<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\CreateStorageBackupRequestStorage;
use Upcloud\Core\Json\JsonProperty;

class CreateStorageBackupRequest extends JsonSerializableType
{
    /**
     * @var CreateStorageBackupRequestStorage $storage Parameters for the point-in-time backup.
     */
    #[JsonProperty('storage')]
    public CreateStorageBackupRequestStorage $storage;

    /**
     * @param array{
     *   storage: CreateStorageBackupRequestStorage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }
}
