<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStorageAclPermission;

class FileStorageAclModify extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $target Client allowed to access the export, expressed as an IP address, a CIDR network prefix, or `*` for all clients.
     */
    #[JsonProperty('target')]
    public ?string $target;

    /**
     * @var ?value-of<FileStorageAclPermission> $permission
     */
    #[JsonProperty('permission')]
    public ?string $permission;

    /**
     * @param array{
     *   name?: ?string,
     *   target?: ?string,
     *   permission?: ?value-of<FileStorageAclPermission>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->target = $values['target'] ?? null;
        $this->permission = $values['permission'] ?? null;
    }
}
