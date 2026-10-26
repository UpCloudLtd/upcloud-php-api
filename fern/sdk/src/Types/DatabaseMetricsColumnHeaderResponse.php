<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a metrics column header response.
 */
class DatabaseMetricsColumnHeaderResponse extends JsonSerializableType
{
    /**
     * @var ?string $label The label for the column header.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $type The label for the column header.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   label?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
