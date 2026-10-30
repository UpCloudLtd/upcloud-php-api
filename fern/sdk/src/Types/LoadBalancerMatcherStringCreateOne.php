<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherStringCreateOne extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerStringMatcherMethodsNoValue> $method
     */
    #[JsonProperty('method')]
    public string $method;

    /**
     * @param array{
     *   method: value-of<LoadBalancerStringMatcherMethodsNoValue>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->method = $values['method'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
