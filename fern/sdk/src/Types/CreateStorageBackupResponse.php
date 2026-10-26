<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response containing the on-demand backup being created.
 */
class CreateStorageBackupResponse extends JsonSerializableType
{
    /**
     * @var StorageDetails $storage
     */
    #[JsonProperty('storage')]
    public StorageDetails $storage;

    /**
     * @param array{
     *   storage: StorageDetails,
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
