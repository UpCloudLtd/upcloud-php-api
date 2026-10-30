<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines a match condition based on the source IP address or subnet. Used when the matcher type is 'src_ip'.
 */
class LoadBalancerMatchIpResponse extends JsonSerializableType
{
    /**
     * @var string $value IP address or CIDR subnet to match against the source IP. Accepts IPv4, IPv6, or CIDR notation.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
