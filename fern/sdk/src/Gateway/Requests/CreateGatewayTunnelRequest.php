<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayTunnelCreateRequest;

class CreateGatewayTunnelRequest extends JsonSerializableType
{
    /**
     * @var GatewayTunnelCreateRequest $body
     */
    public GatewayTunnelCreateRequest $body;

    /**
     * @param array{
     *   body: GatewayTunnelCreateRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
