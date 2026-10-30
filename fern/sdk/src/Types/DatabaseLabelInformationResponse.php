<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema representing a label with a key and value.
 */
class DatabaseLabelInformationResponse extends JsonSerializableType
{
    /**
     * @var ?string $key The key of the label.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $value The value of the label.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   key?: ?string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->key = $values['key'] ?? null;
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
