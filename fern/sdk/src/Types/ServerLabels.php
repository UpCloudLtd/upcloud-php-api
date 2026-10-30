<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Cloud Server labels
 */
class ServerLabels extends JsonSerializableType
{
    /**
     * @var ?array<ServerLabel> $label
     */
    #[JsonProperty('label'), ArrayType([ServerLabel::class])]
    public ?array $label;

    /**
     * @param array{
     *   label?: ?array<ServerLabel>,
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
