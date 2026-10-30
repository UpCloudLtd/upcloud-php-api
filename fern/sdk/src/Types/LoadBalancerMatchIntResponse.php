<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines integer matching criteria for requests or responses.
 */
class LoadBalancerMatchIntResponse extends JsonSerializableType
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

    /**
     * @param array{
     *   method: value-of<LoadBalancerMatchIntResponseMethod>,
     *   value: int,
     *   rangeStart?: ?int,
     *   rangeEnd?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->method = $values['method'];
        $this->value = $values['value'];
        $this->rangeStart = $values['rangeStart'] ?? null;
        $this->rangeEnd = $values['rangeEnd'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
