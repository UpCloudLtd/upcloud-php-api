<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for Cloud Server 404 error responses.
 */
class ServerError404 extends JsonSerializableType
{
    /**
     * @var ServerError404Error $error
     */
    #[JsonProperty('error')]
    public ServerError404Error $error;

    /**
     * @param array{
     *   error: ServerError404Error,
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
