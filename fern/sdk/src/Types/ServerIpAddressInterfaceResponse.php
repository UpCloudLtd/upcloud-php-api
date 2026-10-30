<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * IP address response for a network interface
 */
class ServerIpAddressInterfaceResponse extends JsonSerializableType
{
    /**
     * @var ServerInterfaceIpAddress $ipAddress
     */
    #[JsonProperty('ip_address')]
    public ServerInterfaceIpAddress $ipAddress;

    /**
     * @param array{
     *   ipAddress: ServerInterfaceIpAddress,
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
