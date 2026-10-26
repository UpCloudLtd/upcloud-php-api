<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response containing the backup created before resizing the block storage partition and filesystem.
 */
class ResizeStorageResponse extends JsonSerializableType
{
    /**
     * @var StorageDetails $resizeBackup
     */
    #[JsonProperty('resize_backup')]
    public StorageDetails $resizeBackup;

    /**
     * @param array{
     *   resizeBackup: StorageDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resizeBackup = $values['resizeBackup'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
