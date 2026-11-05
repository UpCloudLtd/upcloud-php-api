<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Service label used as metadata and for filtering File Storage service list results. Both fields are always returned; an empty value is represented as an empty string.
 */
class FileStorageLabelDetails extends JsonSerializableType
{
    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $value
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
