<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayServiceLogSessionTypes;
use Upcloud\Core\Json\JsonProperty;

class GatewayServiceLogSessionCreateRequest extends JsonSerializableType
{
    /**
     * @var value-of<GatewayServiceLogSessionTypes> $sessionType
     */
    #[JsonProperty('session_type')]
    public string $sessionType;

    /**
     * @param array{
     *   sessionType: value-of<GatewayServiceLogSessionTypes>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sessionType = $values['sessionType'];
    }
}
