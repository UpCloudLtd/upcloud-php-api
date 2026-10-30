<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for gateway metrics details.
 */
class GatewayMetricsDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the gateway
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $activeConnections Number of active connections
     */
    #[JsonProperty('active_connections')]
    public ?int $activeConnections;

    /**
     * @var ?DateTime $createdAt Timestamp of when the metrics was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the metrics was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?int $totalAcceptedConnections Number of accepted connections
     */
    #[JsonProperty('total_accepted_connections')]
    public ?int $totalAcceptedConnections;

    /**
     * @var ?int $totalRejectedSessions Number of rejected sessions
     */
    #[JsonProperty('total_rejected_sessions')]
    public ?int $totalRejectedSessions;

    /**
     * @param array{
     *   name?: ?string,
     *   activeConnections?: ?int,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   totalAcceptedConnections?: ?int,
     *   totalRejectedSessions?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->activeConnections = $values['activeConnections'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->totalAcceptedConnections = $values['totalAcceptedConnections'] ?? null;
        $this->totalRejectedSessions = $values['totalRejectedSessions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
