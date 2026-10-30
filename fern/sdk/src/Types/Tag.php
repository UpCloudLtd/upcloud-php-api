<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Container object for a single tag resource.
 */
class Tag extends JsonSerializableType
{
    /**
     * @var TagTag $tag
     */
    #[JsonProperty('tag')]
    public TagTag $tag;

    /**
     * @param array{
     *   tag: TagTag,
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
