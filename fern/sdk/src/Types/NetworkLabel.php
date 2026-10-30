<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A key/value pair to label and categorize resources
 */
class NetworkLabel extends JsonSerializableType
{
    /**
     * @var string $key Label key used to classify the resource
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $value Value associated with the label key
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   key: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
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
