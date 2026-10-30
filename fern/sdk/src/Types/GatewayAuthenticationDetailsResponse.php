<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for authentication details.
 */
class GatewayAuthenticationDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?value-of<GatewayIpsecAuthenticationType> $authentication
     */
    #[JsonProperty('authentication')]
    public ?string $authentication;

    /**
     * @param array{
     *   authentication?: ?value-of<GatewayIpsecAuthenticationType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authentication = $values['authentication'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
