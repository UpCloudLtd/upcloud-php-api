<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents a load balancer plan, defining the node size, performance characteristics, and associated pricing options.
 */
class LoadBalancerPlan extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the plan.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $serverNumber Number of servers included in the plan.
     */
    #[JsonProperty('server_number')]
    public ?int $serverNumber;

    /**
     * @var ?int $perServerMaxSessions Maximum number of sessions allowed per server.
     */
    #[JsonProperty('per_server_max_sessions')]
    public ?int $perServerMaxSessions;

    /**
     * @param array{
     *   name?: ?string,
     *   serverNumber?: ?int,
     *   perServerMaxSessions?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->serverNumber = $values['serverNumber'] ?? null;
        $this->perServerMaxSessions = $values['perServerMaxSessions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
