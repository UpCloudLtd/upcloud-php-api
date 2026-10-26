<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 400 Forbidden errors for tag operations.
 */
class TagError403 extends JsonSerializableType
{
    /**
     * @var TagError403Error $error
     */
    #[JsonProperty('error')]
    public TagError403Error $error;

    /**
     * @param array{
     *   error: TagError403Error,
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
