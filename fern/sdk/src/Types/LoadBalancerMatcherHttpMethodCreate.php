<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Forwarding rule HTTP method matcher
 */
class LoadBalancerMatcherHttpMethodCreate extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerHttpMethods> $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   value: value-of<LoadBalancerHttpMethods>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
