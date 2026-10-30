<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherStringArgCreateOne extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerStringMatcherMethodsNoValue> $method
     */
    #[JsonProperty('method')]
    public string $method;

    /**
     * @var string $name Name of the parameter
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   method: value-of<LoadBalancerStringMatcherMethodsNoValue>,
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->method = $values['method'];
        $this->name = $values['name'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
