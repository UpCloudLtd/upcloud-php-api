<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Request schema for IP address operations
 */
class IpAddressResponse extends JsonSerializableType
{
    /**
     * @var IpAddressDetails $ipAddress
     */
    #[JsonProperty('ip_address')]
    public IpAddressDetails $ipAddress;

    /**
     * @param array{
     *   ipAddress: IpAddressDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddress = $values['ipAddress'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
