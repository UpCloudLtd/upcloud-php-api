<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * IP address object
 */
class LoadBalancerIpAddressCreate extends JsonSerializableType
{
    /**
     * @var string $address IP address
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var ?string $networkName Name of the target network
     */
    #[JsonProperty('network_name')]
    public ?string $networkName;

    /**
     * @param array{
     *   address: string,
     *   networkName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->networkName = $values['networkName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
