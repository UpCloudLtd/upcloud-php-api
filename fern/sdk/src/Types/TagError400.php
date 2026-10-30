<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 400 Bad Request errors for tag operations.
 */
class TagError400 extends JsonSerializableType
{
    /**
     * @var TagError400Error $error
     */
    #[JsonProperty('error')]
    public TagError400Error $error;

    /**
     * @param array{
     *   error: TagError400Error,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
