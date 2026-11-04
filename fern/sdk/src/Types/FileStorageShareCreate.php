<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * NFS share to create. Its name and path must be unique within the service, which can have at most 50 active shares. The immutable path must be absolute, normalized, and contain at most 32 segments. The system creates the backing directory; deleting the share later permanently deletes that directory and all content below it.
 */
class FileStorageShareCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $path
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @var array<FileStorageAclCreate> $acl Access-control entries for the NFS export. An empty array leaves the share without direct export access. Nested shares may still be visible through a parent share, and the most permissive matching entry determines effective access.
     */
    #[JsonProperty('acl'), ArrayType([FileStorageAclCreate::class])]
    public array $acl;

    /**
     * @param array{
     *   name: string,
     *   path: string,
     *   acl: array<FileStorageAclCreate>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->path = $values['path'];
        $this->acl = $values['acl'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
