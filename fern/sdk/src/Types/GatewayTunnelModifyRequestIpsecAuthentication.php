<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * IPsec authentication configuration
 */
class GatewayTunnelModifyRequestIpsecAuthentication extends JsonSerializableType
{
    /**
     * @var value-of<GatewayIpsecAuthenticationType> $authentication
     */
    #[JsonProperty('authentication')]
    public string $authentication;

    /**
     * @var ?string $psk IPsec PSK
     */
    #[JsonProperty('psk')]
    public ?string $psk;

    /**
     * @param array{
     *   authentication: value-of<GatewayIpsecAuthenticationType>,
     *   psk?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authentication = $values['authentication'];
        $this->psk = $values['psk'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
