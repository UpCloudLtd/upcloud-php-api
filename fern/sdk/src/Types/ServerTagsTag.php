<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerTagsTag extends JsonSerializableType
{
    /**
     * @var array<string> $tag
     */
    #[JsonProperty('tag'), ArrayType(['string'])]
    public array $tag;

    /**
     * @param array{
     *   tag: array<string>,
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
