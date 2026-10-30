<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for details of a service log session.
 */
class GatewayServiceLogSessionDetailsResponse extends JsonSerializableType
{
    /**
     * @var string $sessionId
     */
    #[JsonProperty('session_id')]
    public string $sessionId;

    /**
     * @var string $token
     */
    #[JsonProperty('token')]
    public string $token;

    /**
     * @param array{
     *   sessionId: string,
     *   token: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sessionId = $values['sessionId'];
        $this->token = $values['token'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
