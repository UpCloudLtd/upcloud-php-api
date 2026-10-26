<?php

namespace Upcloud\Traits;

use Upcloud\Types\LoadBalancerMatchStringResponseMethod;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines a string-based match condition, used for matching values such as paths, headers, URLs, or hostnames.
 *
 * @property ?value-of<LoadBalancerMatchStringResponseMethod> $method
 * @property ?string $value
 * @property ?bool $ignoreCase
 */
trait LoadBalancerMatchStringResponse
{
    /**
     * @var ?value-of<LoadBalancerMatchStringResponseMethod> $method String comparison method used to evaluate the match condition.
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?string $value String value or pattern to match against using the specified comparison method.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @var ?bool $ignoreCase Indicates whether the string comparison should be case-insensitive.
     */
    #[JsonProperty('ignore_case')]
    public ?bool $ignoreCase;
}
