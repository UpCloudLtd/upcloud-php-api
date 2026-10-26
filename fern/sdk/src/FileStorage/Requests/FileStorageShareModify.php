<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FileStorageAclCreate;
use Upcloud\Core\Types\ArrayType;

class FileStorageShareModify extends JsonSerializableType
{
    /**
     * @var ?string $name A resource name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<FileStorageAclCreate> $acl
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
