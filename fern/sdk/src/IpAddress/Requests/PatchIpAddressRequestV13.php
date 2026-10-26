<?php

namespace Upcloud\IpAddress\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\IpAddress\Types\PatchIpAddressRequestV13IpAddress;
use Upcloud\Core\Json\JsonProperty;

class PatchIpAddressRequestV13 extends JsonSerializableType
{
    /**
     * @var PatchIpAddressRequestV13IpAddress $ipAddress
     */
    #[JsonProperty('ip_address')]
    public PatchIpAddressRequestV13IpAddress $ipAddress;

    /**
     * @param array{
     *   ipAddress: PatchIpAddressRequestV13IpAddress,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddress = $values['ipAddress'];
    }
}
