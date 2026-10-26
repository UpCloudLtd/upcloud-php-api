<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\LoadBalancerCommonMetricsResponse;
use Upcloud\Traits\LoadBalancerServerMetricsResponse;
use Upcloud\Traits\LoadBalancerAvgTimeMetricsResponse;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents collected performance, availability, and traffic statistics for a load balancer backend, including member activity, response times, and aggregated server metrics.
 */
class LoadBalancerBackendMetricsResponse extends JsonSerializableType
{
    use LoadBalancerCommonMetricsResponse;
    use LoadBalancerServerMetricsResponse;
    use LoadBalancerAvgTimeMetricsResponse;

    /**
     * @var int $backendId Unique identifier for the backend.
     */
    #[JsonProperty('backend_id')]
    public int $backendId;

    /**
     * @var string $name Human-readable name of the backend.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $downtimeS Total downtime duration in seconds.
     */
    #[JsonProperty('downtime_s')]
    public int $downtimeS;

    /**
     * @var int $activeServers Number of currently active servers in the backend.
     */
    #[JsonProperty('active_servers')]
    public int $activeServers;

    /**
     * @var int $backupServers Number of backup servers available for failover.
     */
    #[JsonProperty('backup_servers')]
    public int $backupServers;

    /**
     * @var array<LoadBalancerMemberMetricsResponse> $members List of metrics for individual backend members (servers).
     */
    #[JsonProperty('members'), ArrayType([LoadBalancerMemberMetricsResponse::class])]
    public array $members;

    /**
     * @var DateTime $createdAt Timestamp when the backend metrics record was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the backend metrics record was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   totalRequestBytes: int,
     *   totalResponseBytes: int,
     *   totalDeniedResponses: int,
     *   totalHttpResponses1Xx: int,
     *   totalHttpResponses2Xx: int,
     *   totalHttpResponses3Xx: int,
     *   totalHttpResponses4Xx: int,
     *   totalHttpResponses5Xx: int,
     *   totalHttpResponsesOther: int,
     *   totalSessions: int,
     *   sessionRate: int,
     *   currentSessions: int,
     *   totalFailedChecksTransitions: int,
     *   totalClientAborted: int,
     *   totalFailedConnections: int,
     *   totalInvalidResponses: int,
     *   totalRoutedRequests: int,
     *   totalServerAborted: int,
     *   totalServerRedispatches: int,
     *   totalServerConnectionRetries: int,
     *   connectionsWaiting: int,
     *   avgConnectionTimeMs: int,
     *   avgQueueTimeMs: int,
     *   avgServerResponseTimeMs: int,
     *   avgTotalTimeMs: int,
     *   backendId: int,
     *   name: string,
     *   downtimeS: int,
     *   activeServers: int,
     *   backupServers: int,
     *   members: array<LoadBalancerMemberMetricsResponse>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalRequestBytes = $values['totalRequestBytes'];
        $this->totalResponseBytes = $values['totalResponseBytes'];
        $this->totalDeniedResponses = $values['totalDeniedResponses'];
        $this->totalHttpResponses1Xx = $values['totalHttpResponses1Xx'];
        $this->totalHttpResponses2Xx = $values['totalHttpResponses2Xx'];
        $this->totalHttpResponses3Xx = $values['totalHttpResponses3Xx'];
        $this->totalHttpResponses4Xx = $values['totalHttpResponses4Xx'];
        $this->totalHttpResponses5Xx = $values['totalHttpResponses5Xx'];
        $this->totalHttpResponsesOther = $values['totalHttpResponsesOther'];
        $this->totalSessions = $values['totalSessions'];
        $this->sessionRate = $values['sessionRate'];
        $this->currentSessions = $values['currentSessions'];
        $this->totalFailedChecksTransitions = $values['totalFailedChecksTransitions'];
        $this->totalClientAborted = $values['totalClientAborted'];
        $this->totalFailedConnections = $values['totalFailedConnections'];
        $this->totalInvalidResponses = $values['totalInvalidResponses'];
        $this->totalRoutedRequests = $values['totalRoutedRequests'];
        $this->totalServerAborted = $values['totalServerAborted'];
        $this->totalServerRedispatches = $values['totalServerRedispatches'];
        $this->totalServerConnectionRetries = $values['totalServerConnectionRetries'];
        $this->connectionsWaiting = $values['connectionsWaiting'];
        $this->avgConnectionTimeMs = $values['avgConnectionTimeMs'];
        $this->avgQueueTimeMs = $values['avgQueueTimeMs'];
        $this->avgServerResponseTimeMs = $values['avgServerResponseTimeMs'];
        $this->avgTotalTimeMs = $values['avgTotalTimeMs'];
        $this->backendId = $values['backendId'];
        $this->name = $values['name'];
        $this->downtimeS = $values['downtimeS'];
        $this->activeServers = $values['activeServers'];
        $this->backupServers = $values['backupServers'];
        $this->members = $values['members'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
