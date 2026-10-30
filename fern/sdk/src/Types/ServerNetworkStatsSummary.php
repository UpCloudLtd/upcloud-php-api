<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Summarized inbound and outbound network statistics values.
 */
class ServerNetworkStatsSummary extends JsonSerializableType
{
    /**
     * @var array<ServerNetworkStatsSummaryVariableItem> $variable
     */
    #[JsonProperty('variable'), ArrayType([ServerNetworkStatsSummaryVariableItem::class])]
    public array $variable;

    /**
     * @param array{
     *   variable: array<ServerNetworkStatsSummaryVariableItem>,
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
