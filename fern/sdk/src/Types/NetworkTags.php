<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Container object for resource tags.
 */
class NetworkTags extends JsonSerializableType
{
    /**
     * @var NetworkTagsTags $tags
     */
    #[JsonProperty('tags')]
    public NetworkTagsTags $tags;

    /**
     * @param array{
     *   tags: NetworkTagsTags,
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
