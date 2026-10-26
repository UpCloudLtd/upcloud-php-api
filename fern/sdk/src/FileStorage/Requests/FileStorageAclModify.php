<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStoragePermission;

class FileStorageAclModify extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $target The target of the ACL entry. It can be an IP Address, Network Prefix or a wildcard.
     */
    #[JsonProperty('target')]
    public ?string $target;

    /**
     * @var ?value-of<FileStoragePermission> $permission
     */
    #[JsonProperty('permission')]
    public ?string $permission;

    /**
     * @param array{
     *   name?: ?string,
     *   target?: ?string,
     *   permission?: ?value-of<FileStoragePermission>,
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
