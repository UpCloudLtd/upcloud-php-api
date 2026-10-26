<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for legacy error response.
 */
class FirewallRulesetErrorLegacyResponseError extends JsonSerializableType
{
    /**
     * @var ?string $errorCode
     */
    #[JsonProperty('error_code')]
    public ?string $errorCode;

    /**
     * @var ?string $errorMessage
     */
    #[JsonProperty('error_message')]
    public ?string $errorMessage;

    /**
     * @param array{
     *   errorCode?: ?string,
     *   errorMessage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errorCode = $values['errorCode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
