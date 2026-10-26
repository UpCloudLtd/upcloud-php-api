<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class LoadBalancerActionCreateActionSetForwardedHeaders extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionSetForwardedHeadersType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var array<string, mixed> $actionSetForwardedHeaders
     */
    #[JsonProperty('action_set_forwarded_headers'), ArrayType(['string' => 'mixed'])]
    public array $actionSetForwardedHeaders;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionSetForwardedHeadersType>,
     *   actionSetForwardedHeaders: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionSetForwardedHeaders = $values['actionSetForwardedHeaders'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
