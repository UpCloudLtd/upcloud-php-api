<?php

namespace Upcloud\IpAddress\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\IpAddress\Types\AddIpAddressRequestIpAddress;
use Upcloud\Core\Json\JsonProperty;

class AddIpAddressRequest extends JsonSerializableType
{
    /**
     * @var AddIpAddressRequestIpAddress $ipAddress
     */
    #[JsonProperty('ip_address')]
    public AddIpAddressRequestIpAddress $ipAddress;

    /**
     * @param array{
     *   ipAddress: AddIpAddressRequestIpAddress,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddress = $values['ipAddress'];
    }
}
