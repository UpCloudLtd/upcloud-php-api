<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for creating a new share with access control lists (ACLs).
 */
class FileStorageShareCreate extends JsonSerializableType
{
    /**
     * @var string $name A resource name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $path
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @var array<FileStorageAclCreate> $acl
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
