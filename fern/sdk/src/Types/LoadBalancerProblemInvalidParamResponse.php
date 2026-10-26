<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Provides detailed information about a specific invalid parameter that caused a request to fail validation, as an extension of RFC7807 Problem Details.
 */
class LoadBalancerProblemInvalidParamResponse extends JsonSerializableType
{
    /**
     * @var string $name The name of the parameter or form field that caused the validation error. It can include structural delimiters to indicate nested fields (e.g., 'data.attributes.email').
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $reason A human-readable message explaining why the parameter value was invalid, either syntactically or semantically.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   name: string,
     *   reason: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->reason = $values['reason'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
