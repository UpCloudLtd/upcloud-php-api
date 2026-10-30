<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\LoadBalancerMatchIntResponse;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines a backend health matcher used to compare the number of healthy (up) members in a specific backend against a threshold value. Used when the matcher type is 'num_members_up'.
 */
class LoadBalancerMatchBackendResponse extends JsonSerializableType
{
    use LoadBalancerMatchIntResponse;

    /**
     * @var string $backend
     */
    #[JsonProperty('backend')]
    public string $backend;

    /**
     * @param array{
     *   method: value-of<LoadBalancerMatchIntResponseMethod>,
     *   value: int,
     *   backend: string,
     *   rangeStart?: ?int,
     *   rangeEnd?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->method = $values['method'];
        $this->value = $values['value'];
        $this->rangeStart = $values['rangeStart'] ?? null;
        $this->rangeEnd = $values['rangeEnd'] ?? null;
        $this->backend = $values['backend'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
