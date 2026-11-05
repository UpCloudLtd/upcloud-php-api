<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Access-control entry applied to a share's NFS export. For nested shares, matching parent and child entries combine and the most permissive permission determines effective access.
 */
class FileStorageAclDetailResponse extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $target Client allowed to access the export, expressed as an IP address, a CIDR network prefix, or `*` for all clients.
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
