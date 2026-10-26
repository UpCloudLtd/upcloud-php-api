<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A general error response indicating that the request could not be fulfilled due to a technical issue.
 */
class ServerSizeError extends JsonSerializableType
{
    /**
     * @var ServerSizeErrorError $error
     */
    #[JsonProperty('error')]
    public ServerSizeErrorError $error;

    /**
     * @param array{
     *   error: ServerSizeErrorError,
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
