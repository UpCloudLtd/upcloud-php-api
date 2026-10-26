<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for error responses from the API.
 */
class LoadBalancerErrorResponse extends JsonSerializableType
{
    /**
     * @var ?LoadBalancerErrorResponseError $error Error details containing the error message and code.
     */
    #[JsonProperty('error')]
    public ?LoadBalancerErrorResponseError $error;

    /**
     * @param array{
     *   error?: ?LoadBalancerErrorResponseError,
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
