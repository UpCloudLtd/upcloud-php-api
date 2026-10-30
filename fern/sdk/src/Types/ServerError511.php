<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Operation failed error
 */
class ServerError511 extends JsonSerializableType
{
    /**
     * @var ServerError511Error $error
     */
    #[JsonProperty('error')]
    public ServerError511Error $error;

    /**
     * @param array{
     *   error: ServerError511Error,
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
