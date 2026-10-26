<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents detailed server-level performance and reliability metrics, including connection errors, aborted sessions, and routing statistics for a load balancer backend member.
 */
class LoadBalancerServerMetricsResponse extends JsonSerializableType
{
    /**
     * @var int $totalFailedChecksTransitions Total number of times the server transitioned from healthy to failed state due to failed health checks.
     */
    #[JsonProperty('total_failed_checks_transitions')]
    public int $totalFailedChecksTransitions;

    /**
     * @var int $totalClientAborted Total number of sessions aborted by clients before completion.
     */
    #[JsonProperty('total_client_aborted')]
    public int $totalClientAborted;

    /**
     * @var int $totalFailedConnections Total number of failed connection attempts to the server.
     */
    #[JsonProperty('total_failed_connections')]
    public int $totalFailedConnections;

    /**
     * @var int $totalInvalidResponses Total number of invalid responses received from the server.
     */
    #[JsonProperty('total_invalid_responses')]
    public int $totalInvalidResponses;

    /**
     * @var int $totalRoutedRequests Total number of requests successfully routed to the server.
     */
    #[JsonProperty('total_routed_requests')]
    public int $totalRoutedRequests;

    /**
     * @var int $totalServerAborted Total number of sessions aborted by the server before completion.
     */
    #[JsonProperty('total_server_aborted')]
    public int $totalServerAborted;

    /**
     * @var int $totalServerRedispatches Total number of requests that were redispatched to another server after failure.
     */
    #[JsonProperty('total_server_redispatches')]
    public int $totalServerRedispatches;

    /**
     * @var int $totalServerConnectionRetries Total number of retries attempted for failed server connections.
     */
    #[JsonProperty('total_server_connection_retries')]
    public int $totalServerConnectionRetries;

    /**
     * @var int $connectionsWaiting Current number of connections waiting for a server slot.
     */
    #[JsonProperty('connections_waiting')]
    public int $connectionsWaiting;

    /**
     * @param array{
     *   totalFailedChecksTransitions: int,
     *   totalClientAborted: int,
     *   totalFailedConnections: int,
     *   totalInvalidResponses: int,
     *   totalRoutedRequests: int,
     *   totalServerAborted: int,
     *   totalServerRedispatches: int,
     *   totalServerConnectionRetries: int,
     *   connectionsWaiting: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalFailedChecksTransitions = $values['totalFailedChecksTransitions'];
        $this->totalClientAborted = $values['totalClientAborted'];
        $this->totalFailedConnections = $values['totalFailedConnections'];
        $this->totalInvalidResponses = $values['totalInvalidResponses'];
        $this->totalRoutedRequests = $values['totalRoutedRequests'];
        $this->totalServerAborted = $values['totalServerAborted'];
        $this->totalServerRedispatches = $values['totalServerRedispatches'];
        $this->totalServerConnectionRetries = $values['totalServerConnectionRetries'];
        $this->connectionsWaiting = $values['connectionsWaiting'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
