<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for gateway tunnel internal IP details.
 */
class GatewayTunnelInternalIpDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?GatewayAddress $ip
     */
    #[JsonProperty('ip')]
    public ?GatewayAddress $ip;

    /**
     * @var ?bool $hasParseError Indicates if there is a parse error with the tunnel internal IP
     */
    #[JsonProperty('hasParseError')]
    public ?bool $hasParseError;

    /**
     * @param array{
     *   ip?: ?GatewayAddress,
     *   hasParseError?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ip = $values['ip'] ?? null;
        $this->hasParseError = $values['hasParseError'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
