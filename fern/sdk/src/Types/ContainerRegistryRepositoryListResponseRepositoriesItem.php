<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryRepositoryListResponseRepositoriesItem extends JsonSerializableType
{
    /**
     * @var string $name Repository name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $newestTag Tag with the newest manifest timestamp. This is not the tag named latest.
     */
    #[JsonProperty('newest_tag')]
    public ?string $newestTag;

    /**
     * @var ?value-of<ContainerRegistryRepositoryListResponseRepositoriesItemKind> $kind Kind of the newest tag. multi-arch, image, chart, or artifact. The repository can hold other kinds under other tags.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var string $artifactType OCI artifactType of the newest tag. Empty when that manifest is an index that omits artifactType, and on the name-only fallback.
     */
    #[JsonProperty('artifact_type')]
    public string $artifactType;

    /**
     * @var ?string $mediaType Manifest media type of the newest tag.
     */
    #[JsonProperty('media_type')]
    public ?string $mediaType;

    /**
     * @var ?int $sizeBytes Size of the newest tag, including every child of an index.
     */
    #[JsonProperty('size_bytes')]
    public ?int $sizeBytes;

    /**
     * @var ?int $repositorySizeBytes Total size of the files in this repository, across every tag. size_bytes remains the newest tag.
     */
    #[JsonProperty('repository_size_bytes')]
    public ?int $repositorySizeBytes;

    /**
     * @var ?int $tagCount Number of tags in this repository. Omitted when the registry tag list cannot be read.
     */
    #[JsonProperty('tag_count')]
    public ?int $tagCount;

    /**
     * @var ?DateTime $lastUpdated When the newest tag's manifest was last updated.
     */
    #[JsonProperty('last_updated'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUpdated;

    /**
     * @var ?array<ContainerRegistryRepositoryListResponseRepositoriesItemPlatformsItem> $platforms Pullable platforms of the newest tag. unknown/unknown attestations are omitted.
     */
    #[JsonProperty('platforms'), ArrayType([ContainerRegistryRepositoryListResponseRepositoriesItemPlatformsItem::class])]
    public ?array $platforms;

    /**
     * @param array{
     *   name: string,
     *   artifactType: string,
     *   newestTag?: ?string,
     *   kind?: ?value-of<ContainerRegistryRepositoryListResponseRepositoriesItemKind>,
     *   mediaType?: ?string,
     *   sizeBytes?: ?int,
     *   repositorySizeBytes?: ?int,
     *   tagCount?: ?int,
     *   lastUpdated?: ?DateTime,
     *   platforms?: ?array<ContainerRegistryRepositoryListResponseRepositoriesItemPlatformsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->newestTag = $values['newestTag'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->artifactType = $values['artifactType'];
        $this->mediaType = $values['mediaType'] ?? null;
        $this->sizeBytes = $values['sizeBytes'] ?? null;
        $this->repositorySizeBytes = $values['repositorySizeBytes'] ?? null;
        $this->tagCount = $values['tagCount'] ?? null;
        $this->lastUpdated = $values['lastUpdated'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
