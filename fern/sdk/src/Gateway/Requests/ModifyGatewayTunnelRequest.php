<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayTunnelModifyRequest;

class ModifyGatewayTunnelRequest extends JsonSerializableType
{
    /**
     * @var GatewayTunnelModifyRequest $body
     */
    public GatewayTunnelModifyRequest $body;

    /**
     * @param array{
     *   body: GatewayTunnelModifyRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
