<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * CEL expression used to validate a token claim.
 */
class KubernetesClaimValidationRule extends JsonSerializableType
{
    /**
     * @var ?string $claim
     */
    #[JsonProperty('claim')]
    public ?string $claim;

    /**
     * @var ?string $requiredValue
     */
    #[JsonProperty('required_value')]
    public ?string $requiredValue;

    /**
     * @var ?string $expression
     */
    #[JsonProperty('expression')]
    public ?string $expression;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   claim?: ?string,
     *   requiredValue?: ?string,
     *   expression?: ?string,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->claim = $values['claim'] ?? null;
        $this->requiredValue = $values['requiredValue'] ?? null;
        $this->expression = $values['expression'] ?? null;
        $this->message = $values['message'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
