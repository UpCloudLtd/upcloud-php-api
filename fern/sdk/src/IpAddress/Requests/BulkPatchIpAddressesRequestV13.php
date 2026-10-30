<?php

namespace Upcloud\IpAddress\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\IpAddress\Types\BulkPatchIpAddressesRequestV13IpAddressesItem;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class BulkPatchIpAddressesRequestV13 extends JsonSerializableType
{
    /**
     * @var array<BulkPatchIpAddressesRequestV13IpAddressesItem> $ipAddresses
     */
    #[JsonProperty('ip_addresses'), ArrayType([BulkPatchIpAddressesRequestV13IpAddressesItem::class])]
    public array $ipAddresses;

    /**
     * @param array{
     *   ipAddresses: array<BulkPatchIpAddressesRequestV13IpAddressesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipAddresses = $values['ipAddresses'];
    }
}
