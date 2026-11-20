<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayServiceLogSessionType;
use Upcloud\Core\Json\JsonProperty;

class GatewayServiceLogSessionCreateRequest extends JsonSerializableType
{
    /**
     * @var value-of<GatewayServiceLogSessionType> $sessionType
     */
    #[JsonProperty('session_type')]
    public string $sessionType;

    /**
     * @param array{
     *   sessionType: value-of<GatewayServiceLogSessionType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sessionType = $values['sessionType'];
    }
}
