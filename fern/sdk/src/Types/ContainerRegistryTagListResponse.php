<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryTagListResponse extends JsonSerializableType
{
    /**
     * @var string $name Repository name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<ContainerRegistryTagListResponseTagsItem> $tags Tags in the repository, with digest, size, and platforms when the registry supports it.
     */
    #[JsonProperty('tags'), ArrayType([ContainerRegistryTagListResponseTagsItem::class])]
    public array $tags;

    /**
     * @param array{
     *   name: string,
     *   tags: array<ContainerRegistryTagListResponseTagsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->tags = $values['tags'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
