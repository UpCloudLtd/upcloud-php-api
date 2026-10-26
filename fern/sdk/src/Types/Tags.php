<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Container object for resource tags.
 */
class Tags extends JsonSerializableType
{
    /**
     * @var TagsTags $tags
     */
    #[JsonProperty('tags')]
    public TagsTags $tags;

    /**
     * @param array{
     *   tags: TagsTags,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
