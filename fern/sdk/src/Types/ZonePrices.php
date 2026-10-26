<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Pricing information organized by zone.
 */
class ZonePrices extends JsonSerializableType
{
    /**
     * @var ?array<string, ZonePricesItemsValue> $items
     */
    #[JsonProperty('items'), ArrayType(['string' => ZonePricesItemsValue::class])]
    public ?array $items;

    /**
     * @param array{
     *   items?: ?array<string, ZonePricesItemsValue>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->items = $values['items'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
