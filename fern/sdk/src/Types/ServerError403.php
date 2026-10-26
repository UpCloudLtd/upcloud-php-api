<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Forbidden error
 */
class ServerError403 extends JsonSerializableType
{
    /**
     * @var ServerError403Error $error
     */
    #[JsonProperty('error')]
    public ServerError403Error $error;

    /**
     * @param array{
     *   error: ServerError403Error,
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
