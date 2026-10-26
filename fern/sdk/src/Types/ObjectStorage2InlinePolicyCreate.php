<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating an inline policy.
 */
class ObjectStorage2InlinePolicyCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the inline policy.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $document A valid policy document.
     */
    #[JsonProperty('document')]
    public string $document;

    /**
     * @param array{
     *   name: string,
     *   document: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->document = $values['document'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
