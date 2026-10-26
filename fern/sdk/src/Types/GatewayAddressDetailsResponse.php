<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for gateway address details.
 */
class GatewayAddressDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the address
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $address VPN address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?string $provisionedBy Provisioner of the address
     */
    #[JsonProperty('provisioned_by')]
    public ?string $provisionedBy;

    /**
     * @param array{
     *   name?: ?string,
     *   address?: ?string,
     *   provisionedBy?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->provisionedBy = $values['provisionedBy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
