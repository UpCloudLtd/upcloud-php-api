<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkTagsTags extends JsonSerializableType
{
    /**
     * @var array<NetworkTagsTagsTagItem> $tag
     */
    #[JsonProperty('tag'), ArrayType([NetworkTagsTagsTagItem::class])]
    public array $tag;

    /**
     * @param array{
     *   tag: array<NetworkTagsTagsTagItem>,
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
