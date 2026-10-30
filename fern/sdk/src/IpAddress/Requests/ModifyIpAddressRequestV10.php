<?php

namespace Upcloud\IpAddress\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\IpAddress\Types\ModifyIpAddressRequestV10IpAddress;
use Upcloud\Core\Json\JsonProperty;

class ModifyIpAddressRequestV10 extends JsonSerializableType
{
    /**
     * @var ModifyIpAddressRequestV10IpAddress $ipAddress
     */
    #[JsonProperty('ip_address')]
    public ModifyIpAddressRequestV10IpAddress $ipAddress;

    /**
     * @param array{
     *   ipAddress: ModifyIpAddressRequestV10IpAddress,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddress = $values['ipAddress'];
    }
}
