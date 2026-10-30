<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines an HTTP redirection action used to redirect incoming requests to a specified URL with a given HTTP status code. Used when the action type is 'http_redirect'.
 */
class LoadBalancerActionHttpRedirectResponse extends JsonSerializableType
{
    /**
     * @var string $location Absolute or relative URL to which requests are redirected.
     */
    #[JsonProperty('location')]
    public string $location;

    /**
     * @var int $status HTTP status code for the redirection. Common values are 301 (permanent) or 302 (temporary).
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @param array{
     *   location: string,
     *   status: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->location = $values['location'];
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
