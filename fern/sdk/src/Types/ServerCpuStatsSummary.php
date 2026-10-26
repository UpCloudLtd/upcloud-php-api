<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Summarized CPU statistics values.
 */
class ServerCpuStatsSummary extends JsonSerializableType
{
    /**
     * @var array<ServerCpuStatsSummaryVariableItem> $variable
     */
    #[JsonProperty('variable'), ArrayType([ServerCpuStatsSummaryVariableItem::class])]
    public array $variable;

    /**
     * @param array{
     *   variable: array<ServerCpuStatsSummaryVariableItem>,
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
