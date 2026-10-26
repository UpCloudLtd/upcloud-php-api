<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Forwarding rule IP matcher for matching source IP addresses. Accepts IPv4, IPv6 addresses or CIDR notation.
 */
class LoadBalancerMatcherIpCreate extends JsonSerializableType
{
    /**
     * @var string $value IP address or CIDR to match against. Accepts IPv4 (e.g., 192.168.1.1), IPv6 (e.g., 2001:db8::1), or CIDR notation (e.g., 192.168.1.0/24).
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
