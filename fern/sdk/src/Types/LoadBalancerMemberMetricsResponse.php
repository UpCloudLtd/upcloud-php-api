<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\LoadBalancerCommonMetricsResponse;
use Upcloud\Traits\LoadBalancerServerMetricsResponse;
use Upcloud\Traits\LoadBalancerAvgTimeMetricsResponse;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents detailed performance and health metrics for an individual backend member (server) within a load balancer. Includes operational status, health check results, and aggregated traffic and timing statistics.
 */
class LoadBalancerMemberMetricsResponse extends JsonSerializableType
{
    use LoadBalancerCommonMetricsResponse;
    use LoadBalancerServerMetricsResponse;
    use LoadBalancerAvgTimeMetricsResponse;

    /**
     * @var int $memberId Unique identifier of the backend member.
     */
    #[JsonProperty('member_id')]
    public int $memberId;

    /**
     * @var string $name Human-readable name of the backend member.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $backendId Identifier of the backend this member belongs to.
     */
    #[JsonProperty('backend_id')]
    public int $backendId;

    /**
     * @var value-of<LoadBalancerMemberMetricsResponseStatus> $status Current operational status of the member.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<LoadBalancerMemberMetricsResponseCheckStatus> $checkStatus Result of the latest health check for the member.
     */
    #[JsonProperty('check_status')]
    public string $checkStatus;

    /**
     * @var int $checkHttpCode HTTP status code returned by the last health check (if applicable).
     */
    #[JsonProperty('check_http_code')]
    public int $checkHttpCode;

    /**
     * @var ?string $lastCheckContent Response content returned by the last health check.
     */
    #[JsonProperty('last_check_content')]
    public ?string $lastCheckContent;

    /**
     * @var ?string $lastCheckDesc Description or additional diagnostic information from the last health check.
     */
    #[JsonProperty('last_check_desc')]
    public ?string $lastCheckDesc;

    /**
     * @var int $totalFailedChecks Total number of failed health checks recorded for this member.
     */
    #[JsonProperty('total_failed_checks')]
    public int $totalFailedChecks;

    /**
     * @var DateTime $createdAt Timestamp of when the member was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp of when the member metrics were last updated.
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
     *   memberId: int,
     *   name: string,
     *   backendId: int,
     *   status: value-of<LoadBalancerMemberMetricsResponseStatus>,
     *   checkStatus: value-of<LoadBalancerMemberMetricsResponseCheckStatus>,
     *   checkHttpCode: int,
     *   totalFailedChecks: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   lastCheckContent?: ?string,
     *   lastCheckDesc?: ?string,
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
        $this->memberId = $values['memberId'];
        $this->name = $values['name'];
        $this->backendId = $values['backendId'];
        $this->status = $values['status'];
        $this->checkStatus = $values['checkStatus'];
        $this->checkHttpCode = $values['checkHttpCode'];
        $this->lastCheckContent = $values['lastCheckContent'] ?? null;
        $this->lastCheckDesc = $values['lastCheckDesc'] ?? null;
        $this->totalFailedChecks = $values['totalFailedChecks'];
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
