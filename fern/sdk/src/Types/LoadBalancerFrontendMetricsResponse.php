<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\LoadBalancerCommonMetricsResponse;
use Upcloud\Traits\LoadBalancerRequestMetricsResponse;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents aggregated performance and traffic metrics for a load balancer frontend, including connection statistics, HTTP response counts, and per-second request rates. Combines general metrics, request-specific metrics, and creation timestamps for observability and monitoring purposes.
 */
class LoadBalancerFrontendMetricsResponse extends JsonSerializableType
{
    use LoadBalancerCommonMetricsResponse;
    use LoadBalancerRequestMetricsResponse;

    /**
     * @var int $frontendId Unique identifier for the frontend.
     */
    #[JsonProperty('frontend_id')]
    public int $frontendId;

    /**
     * @var string $name Human-readable name of the frontend.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $requestRate Rate of incoming requests per second.
     */
    #[JsonProperty('request_rate')]
    public int $requestRate;

    /**
     * @var int $totalDeniedConnections Total number of denied client connections.
     */
    #[JsonProperty('total_denied_connections')]
    public int $totalDeniedConnections;

    /**
     * @var int $totalDeniedSessions Total number of denied sessions due to connection or rule constraints.
     */
    #[JsonProperty('total_denied_sessions')]
    public int $totalDeniedSessions;

    /**
     * @var int $totalInvalidRequests Total number of malformed or invalid HTTP requests received.
     */
    #[JsonProperty('total_invalid_requests')]
    public int $totalInvalidRequests;

    /**
     * @var DateTime $createdAt Timestamp indicating when the frontend metrics entry was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp indicating when the frontend metrics entry was last updated.
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
     *   totalHttpRequests: int,
     *   totalDeniedRequests: int,
     *   totalInterceptedRequests: int,
     *   frontendId: int,
     *   name: string,
     *   requestRate: int,
     *   totalDeniedConnections: int,
     *   totalDeniedSessions: int,
     *   totalInvalidRequests: int,
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
        $this->totalHttpRequests = $values['totalHttpRequests'];
        $this->totalDeniedRequests = $values['totalDeniedRequests'];
        $this->totalInterceptedRequests = $values['totalInterceptedRequests'];
        $this->frontendId = $values['frontendId'];
        $this->name = $values['name'];
        $this->requestRate = $values['requestRate'];
        $this->totalDeniedConnections = $values['totalDeniedConnections'];
        $this->totalDeniedSessions = $values['totalDeniedSessions'];
        $this->totalInvalidRequests = $values['totalInvalidRequests'];
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
