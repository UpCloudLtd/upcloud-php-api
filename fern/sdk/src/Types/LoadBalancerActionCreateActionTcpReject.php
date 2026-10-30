<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class LoadBalancerActionCreateActionTcpReject extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionTcpRejectType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var array<string, mixed> $actionTcpReject
     */
    #[JsonProperty('action_tcp_reject'), ArrayType(['string' => 'mixed'])]
    public array $actionTcpReject;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionTcpRejectType>,
     *   actionTcpReject: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionTcpReject = $values['actionTcpReject'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
