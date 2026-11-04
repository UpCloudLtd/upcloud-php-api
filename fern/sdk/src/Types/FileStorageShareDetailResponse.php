<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * NFS share and its access-control entries.
 */
class FileStorageShareDetailResponse extends JsonSerializableType
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
     * @var array<FileStorageAclDetailResponse> $acl Access-control entries for the NFS export. An empty array means the share has no direct export access, although a nested share may remain visible through a parent export.
     */
    #[JsonProperty('acl'), ArrayType([FileStorageAclDetailResponse::class])]
    public array $acl;

    /**
     * @var ?bool $deleting Indicates that asynchronous deletion of the share and its backing directory is in progress. Omitted when false.
     */
    #[JsonProperty('deleting')]
    public ?bool $deleting;

    /**
     * @param array{
     *   name: string,
     *   path: string,
     *   acl: array<FileStorageAclDetailResponse>,
     *   deleting?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->path = $values['path'];
        $this->acl = $values['acl'];
        $this->deleting = $values['deleting'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
