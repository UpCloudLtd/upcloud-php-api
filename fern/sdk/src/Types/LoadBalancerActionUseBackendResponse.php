<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines the backend target to which the request should be routed when the rule matches. Used when the action type is 'use_backend'.
 */
class LoadBalancerActionUseBackendResponse extends JsonSerializableType
{
    /**
     * @var string $backend Name of the backend to which the request should be routed when this action executes.
     */
    #[JsonProperty('backend')]
    public string $backend;

    /**
     * @param array{
     *   backend: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->backend = $values['backend'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
