<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Service label used as metadata and for filtering File Storage service list results. A service can have at most 255 labels, and the key must be unique within the service regardless of case.
 */
class FileStorageLabelCreate extends JsonSerializableType
{
    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?string $value
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
