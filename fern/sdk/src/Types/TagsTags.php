<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class TagsTags extends JsonSerializableType
{
    /**
     * @var array<TagsTagsTagItem> $tag
     */
    #[JsonProperty('tag'), ArrayType([TagsTagsTagItem::class])]
    public array $tag;

    /**
     * @param array{
     *   tag: array<TagsTagsTagItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->tag = $values['tag'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
