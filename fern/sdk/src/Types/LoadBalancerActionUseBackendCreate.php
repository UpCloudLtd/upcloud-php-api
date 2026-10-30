<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Forwarding rule use backend action
 */
class LoadBalancerActionUseBackendCreate extends JsonSerializableType
{
    /**
     * @var string $backend Name of the backend
     */
    #[JsonProperty('backend')]
    public string $backend;

    /**
     * @param array{
     *   backend: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
