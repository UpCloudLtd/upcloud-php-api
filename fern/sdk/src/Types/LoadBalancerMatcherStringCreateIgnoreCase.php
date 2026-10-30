<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherStringCreateIgnoreCase extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerStringMatcherMethods> $method
     */
    #[JsonProperty('method')]
    public string $method;

    /**
     * @var string $value Value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @var ?bool $ignoreCase Ignore case
     */
    #[JsonProperty('ignore_case')]
    public ?bool $ignoreCase;

    /**
     * @param array{
     *   method: value-of<LoadBalancerStringMatcherMethods>,
     *   value: string,
     *   ignoreCase?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->method = $values['method'];
        $this->value = $values['value'];
        $this->ignoreCase = $values['ignoreCase'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
