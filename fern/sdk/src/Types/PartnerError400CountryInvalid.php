<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * The attribute country has an invalid value.
 */
class PartnerError400CountryInvalid extends JsonSerializableType
{
    /**
     * @var string $errorMessage
     */
    #[JsonProperty('error_message')]
    public string $errorMessage;

    /**
     * @param array{
     *   errorMessage: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
