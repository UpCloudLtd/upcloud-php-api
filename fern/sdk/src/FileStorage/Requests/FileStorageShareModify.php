<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStorageAclCreate;
use Upcloud\Core\Types\ArrayType;

class FileStorageShareModify extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<FileStorageAclCreate> $acl Complete replacement access-control collection for the NFS export. Omit this property to retain all current entries. An empty array removes direct export access; a nested share may still be visible through a parent export. When multiple parent or child rules match a client, the most permissive permission determines effective access.
     */
    #[JsonProperty('acl'), ArrayType([FileStorageAclCreate::class])]
    public ?array $acl;

    /**
     * @param array{
     *   name?: ?string,
     *   acl?: ?array<FileStorageAclCreate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->acl = $values['acl'] ?? null;
    }
}
