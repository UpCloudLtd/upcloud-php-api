<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayConnectionModifyRequest;

class ModifyGatewayConnectionRequest extends JsonSerializableType
{
    /**
     * @var GatewayConnectionModifyRequest $body
     */
    public GatewayConnectionModifyRequest $body;

    /**
     * @param array{
     *   body: GatewayConnectionModifyRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
