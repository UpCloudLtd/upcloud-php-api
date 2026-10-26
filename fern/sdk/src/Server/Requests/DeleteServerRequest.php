<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerLegacyBoolean;
use Upcloud\Server\Types\DeleteServerRequestBackups;

class DeleteServerRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerLegacyBoolean> $storages Whether to delete attached storage devices.
     */
    public ?string $storages;

    /**
     * @var ?value-of<DeleteServerRequestBackups> $backups How to handle backups when deleting storage devices. The delete value is valid only when storages is set to a truthy value.
     */
    public ?string $backups;

    /**
     * @param array{
     *   storages?: ?value-of<ServerLegacyBoolean>,
     *   backups?: ?value-of<DeleteServerRequestBackups>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->storages = $values['storages'] ?? null;
        $this->backups = $values['backups'] ?? null;
    }
}
