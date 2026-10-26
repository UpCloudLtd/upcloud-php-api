<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseErrorResponseError extends JsonSerializableType
{
    /**
     * @var string $errorMessage Error message describing the error.
     */
    #[JsonProperty('error_message')]
    public string $errorMessage;

    /**
     * @var string $errorCode Error code associated with the error.
     */
    #[JsonProperty('error_code')]
    public string $errorCode;

    /**
     * @param array{
     *   errorMessage: string,
     *   errorCode: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->errorMessage = $values['errorMessage'];
        $this->errorCode = $values['errorCode'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
