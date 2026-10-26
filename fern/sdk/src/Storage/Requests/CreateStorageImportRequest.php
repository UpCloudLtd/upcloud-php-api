<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\CreateStorageImportRequestStorageImport;
use Upcloud\Core\Json\JsonProperty;

class CreateStorageImportRequest extends JsonSerializableType
{
    /**
     * @var CreateStorageImportRequestStorageImport $storageImport Storage import parameters.
     */
    #[JsonProperty('storage_import')]
    public CreateStorageImportRequestStorageImport $storageImport;

    /**
     * @param array{
     *   storageImport: CreateStorageImportRequestStorageImport,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageImport = $values['storageImport'];
    }
}
