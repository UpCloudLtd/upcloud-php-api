<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * a dependency definition
 */
class DatabaseDependencyResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $required List of required properties when this dependency is present
     */
    #[JsonProperty('required'), ArrayType(['string'])]
    public ?array $required;

    /**
     * @param array{
     *   required?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
