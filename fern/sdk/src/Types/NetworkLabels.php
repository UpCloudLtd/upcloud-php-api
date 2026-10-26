<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Collection of key/value labels for a resource.
 */
class NetworkLabels extends JsonSerializableType
{
    /**
     * @var ?array<NetworkLabel> $label
     */
    #[JsonProperty('label'), ArrayType([NetworkLabel::class])]
    public ?array $label;

    /**
     * @param array{
     *   label?: ?array<NetworkLabel>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
