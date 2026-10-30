<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for service log session creation.
 */
class GatewayServiceLogSessionCreateResponse extends JsonSerializableType
{
    /**
     * @var array<GatewayServiceLogSessionDetailsResponse> $sessions List of service sessions created.
     */
    #[JsonProperty('sessions'), ArrayType([GatewayServiceLogSessionDetailsResponse::class])]
    public array $sessions;

    /**
     * @param array{
     *   sessions: array<GatewayServiceLogSessionDetailsResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sessions = $values['sessions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
