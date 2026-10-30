<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Conflict error
 */
class ServerError409 extends JsonSerializableType
{
    /**
     * @var ServerError409Error $error
     */
    #[JsonProperty('error')]
    public ServerError409Error $error;

    /**
     * @param array{
     *   error: ServerError409Error,
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
