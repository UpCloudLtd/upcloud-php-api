<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Summarized disk read and write statistics values.
 */
class ServerDiskStatsSummary extends JsonSerializableType
{
    /**
     * @var array<ServerDiskStatsSummaryVariableItem> $variable
     */
    #[JsonProperty('variable'), ArrayType([ServerDiskStatsSummaryVariableItem::class])]
    public array $variable;

    /**
     * @param array{
     *   variable: array<ServerDiskStatsSummaryVariableItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->variable = $values['variable'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
