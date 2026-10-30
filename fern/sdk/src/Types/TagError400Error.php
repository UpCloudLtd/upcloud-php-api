<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class TagError400Error extends JsonSerializableType
{
    /**
     * @var value-of<TagError400ErrorErrorCode> $errorCode
     */
    #[JsonProperty('error_code')]
    public string $errorCode;

    /**
     * @var string $errorMessage
     */
    #[JsonProperty('error_message')]
    public string $errorMessage;

    /**
     * @param array{
     *   errorCode: value-of<TagError400ErrorErrorCode>,
     *   errorMessage: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->errorCode = $values['errorCode'];
        $this->errorMessage = $values['errorMessage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
