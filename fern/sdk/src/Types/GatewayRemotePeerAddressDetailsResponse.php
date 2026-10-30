<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for remote peer address details.
 */
class GatewayRemotePeerAddressDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $address Remote peer address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @param array{
     *   address?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
