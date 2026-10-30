<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\DeleteStorageRequestBackups;

class DeleteStorageRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<DeleteStorageRequestBackups> $backups Policy for handling backups when deleting a storage resource. Defaults to `keep`. Allowed values: keep, delete, keep_latest
     */
    public ?string $backups;

    /**
     * @param array{
     *   backups?: ?value-of<DeleteStorageRequestBackups>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backups = $values['backups'] ?? null;
    }
}
