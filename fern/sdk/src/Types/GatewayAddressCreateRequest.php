<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Gateway address
 */
class GatewayAddressCreateRequest extends JsonSerializableType
{
    /**
     * @var string $name Name of the address
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $address Floating IP address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @param array{
     *   name: string,
     *   address?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->address = $values['address'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
