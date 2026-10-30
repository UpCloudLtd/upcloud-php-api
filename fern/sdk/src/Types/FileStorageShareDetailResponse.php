<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for the detailed response of a share.
 */
class FileStorageShareDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?array<FileStorageShareDetailResponseAclItem> $acl
     */
    #[JsonProperty('acl'), ArrayType([FileStorageShareDetailResponseAclItem::class])]
    public ?array $acl;

    /**
     * @param array{
     *   name?: ?string,
     *   path?: ?string,
     *   acl?: ?array<FileStorageShareDetailResponseAclItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->acl = $values['acl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
