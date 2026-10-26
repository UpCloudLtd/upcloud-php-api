<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayConnectionCreateRequest;

class CreateGatewayConnectionRequest extends JsonSerializableType
{
    /**
     * @var GatewayConnectionCreateRequest $body
     */
    public GatewayConnectionCreateRequest $body;

    /**
     * @param array{
     *   body: GatewayConnectionCreateRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
