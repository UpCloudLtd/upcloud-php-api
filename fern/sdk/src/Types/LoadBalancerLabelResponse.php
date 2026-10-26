<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents a key-value label associated with the load balancer service
 */
class LoadBalancerLabelResponse extends JsonSerializableType
{
    /**
     * @var string $key Label key used for identification and filtering.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?string $value The value of the label (optional).
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   key: string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
