<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for block storage modification operations.
 */
class ModifyStorageResponse extends JsonSerializableType
{
    /**
     * @var StorageDetails $storage
     */
    #[JsonProperty('storage')]
    public StorageDetails $storage;

    /**
     * @var ?StorageDetails $resizeBackup
     */
    #[JsonProperty('resize_backup')]
    public ?StorageDetails $resizeBackup;

    /**
     * @param array{
     *   storage: StorageDetails,
     *   resizeBackup?: ?StorageDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
        $this->resizeBackup = $values['resizeBackup'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
