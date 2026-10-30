<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayLabelCreateRequest;

class CreateGatewayServiceLabelRequest extends JsonSerializableType
{
    /**
     * @var GatewayLabelCreateRequest $body
     */
    public GatewayLabelCreateRequest $body;

    /**
     * @param array{
     *   body: GatewayLabelCreateRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
