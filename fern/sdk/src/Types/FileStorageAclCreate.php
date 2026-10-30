<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating an ACL entry.
 */
class FileStorageAclCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $target The target of the ACL entry. It can be an IP Address, Network Prefix or a wildcard.
     */
    #[JsonProperty('target')]
    public string $target;

    /**
     * @var value-of<FileStoragePermission> $permission
     */
    #[JsonProperty('permission')]
    public string $permission;

    /**
     * @param array{
     *   name: string,
     *   target: string,
     *   permission: value-of<FileStoragePermission>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->target = $values['target'];
        $this->permission = $values['permission'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
