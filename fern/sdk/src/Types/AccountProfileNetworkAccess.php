<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountProfileNetworkAccess extends JsonSerializableType
{
    /**
     * @var array<string> $network
     */
    #[JsonProperty('network'), ArrayType(['string'])]
    public array $network;

    /**
     * @param array{
     *   network: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->network = $values['network'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
