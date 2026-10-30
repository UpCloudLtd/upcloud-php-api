<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines a string-based match condition, used for matching values such as paths, headers, URLs, or hostnames.
 */
class LoadBalancerMatchStringResponse extends JsonSerializableType
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

    /**
     * @param array{
     *   method?: ?value-of<LoadBalancerMatchStringResponseMethod>,
     *   value?: ?string,
     *   ignoreCase?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->method = $values['method'] ?? null;
        $this->value = $values['value'] ?? null;
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
