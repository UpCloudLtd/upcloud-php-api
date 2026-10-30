<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines an action that adds or modifies an HTTP header in a request or response. Used when the action type is 'set_request_header' or 'set_response_header'.
 */
class LoadBalancerActionSetHeaderResponse extends JsonSerializableType
{
    /**
     * @var string $header Name of the HTTP header to add or modify.
     */
    #[JsonProperty('header')]
    public string $header;

    /**
     * @var string $value Value to assign to the specified header.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   header: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->header = $values['header'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
