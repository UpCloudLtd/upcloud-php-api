<?php

namespace Upcloud\Traits;

use Upcloud\Types\LoadBalancerMatchIntResponseMethod;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines integer matching criteria for requests or responses.
 *
 * @property value-of<LoadBalancerMatchIntResponseMethod> $method
 * @property int $value
 * @property ?int $rangeStart
 * @property ?int $rangeEnd
 */
trait LoadBalancerMatchIntResponse
{
    /**
     * @var value-of<LoadBalancerMatchIntResponseMethod> $method Comparison method used to evaluate the integer value.
     */
    #[JsonProperty('method')]
    public string $method;

    /**
     * @var int $value Integer value to compare against using the specified comparison method.
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @var ?int $rangeStart Starting value of the range for range-based integer matching.
     */
    #[JsonProperty('range_start')]
    public ?int $rangeStart;

    /**
     * @var ?int $rangeEnd Ending value of the range for range-based integer matching.
     */
    #[JsonProperty('range_end')]
    public ?int $rangeEnd;
}
