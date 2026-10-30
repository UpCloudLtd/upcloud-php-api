<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response containing a storage import task.
 */
class StorageImportResponse extends JsonSerializableType
{
    /**
     * @var StorageImport $storageImport
     */
    #[JsonProperty('storage_import')]
    public StorageImport $storageImport;

    /**
     * @param array{
     *   storageImport: StorageImport,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageImport = $values['storageImport'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
