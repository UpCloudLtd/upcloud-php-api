<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 404 Not Found errors for tag operations.
 */
class TagError404 extends JsonSerializableType
{
    /**
     * @var TagError404Error $error
     */
    #[JsonProperty('error')]
    public TagError404Error $error;

    /**
     * @param array{
     *   error: TagError404Error,
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
