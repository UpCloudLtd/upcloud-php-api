<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Bad request error
 */
class ServerError400 extends JsonSerializableType
{
    /**
     * @var ServerError400Error $error
     */
    #[JsonProperty('error')]
    public ServerError400Error $error;

    /**
     * @param array{
     *   error: ServerError400Error,
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
