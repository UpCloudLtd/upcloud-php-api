<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for error responses from the API.
 */
class DatabaseErrorResponse extends JsonSerializableType
{
    /**
     * @var ?DatabaseErrorResponseError $error
     */
    #[JsonProperty('error')]
    public ?DatabaseErrorResponseError $error;

    /**
     * @param array{
     *   error?: ?DatabaseErrorResponseError,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
