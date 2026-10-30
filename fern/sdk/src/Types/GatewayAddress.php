<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class GatewayAddress extends JsonSerializableType
{
    /**
     * @var ?int $addr Address
     */
    #[JsonProperty('addr')]
    public ?int $addr;

    /**
     * @param array{
     *   addr?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addr = $values['addr'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
