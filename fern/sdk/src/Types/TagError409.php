<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 409 Conflict errors for tag operations.
 */
class TagError409 extends JsonSerializableType
{
    /**
     * @var TagError409Error $error
     */
    #[JsonProperty('error')]
    public TagError409Error $error;

    /**
     * @param array{
     *   error: TagError409Error,
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
