<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents general traffic and session statistics collected for a load balancer frontend or backend, including request and response byte counts, HTTP status distribution, and session activity metrics.
 */
class LoadBalancerCommonMetricsResponse extends JsonSerializableType
{
    /**
     * @var int $totalRequestBytes Total number of request bytes processed.
     */
    #[JsonProperty('total_request_bytes')]
    public int $totalRequestBytes;

    /**
     * @var int $totalResponseBytes Total number of response bytes processed.
     */
    #[JsonProperty('total_response_bytes')]
    public int $totalResponseBytes;

    /**
     * @var int $totalDeniedResponses Total number of denied responses.
     */
    #[JsonProperty('total_denied_responses')]
    public int $totalDeniedResponses;

    /**
     * @var int $totalHttpResponses1Xx Total number of HTTP 1xx informational responses.
     */
    #[JsonProperty('total_http_responses_1xx')]
    public int $totalHttpResponses1Xx;

    /**
     * @var int $totalHttpResponses2Xx Total number of HTTP 2xx successful responses.
     */
    #[JsonProperty('total_http_responses_2xx')]
    public int $totalHttpResponses2Xx;

    /**
     * @var int $totalHttpResponses3Xx Total number of HTTP 3xx redirection responses.
     */
    #[JsonProperty('total_http_responses_3xx')]
    public int $totalHttpResponses3Xx;

    /**
     * @var int $totalHttpResponses4Xx Total number of HTTP 4xx client error responses.
     */
    #[JsonProperty('total_http_responses_4xx')]
    public int $totalHttpResponses4Xx;

    /**
     * @var int $totalHttpResponses5Xx Total number of HTTP 5xx server error responses.
     */
    #[JsonProperty('total_http_responses_5xx')]
    public int $totalHttpResponses5Xx;

    /**
     * @var int $totalHttpResponsesOther Total number of HTTP responses outside the standard 1xx–5xx range.
     */
    #[JsonProperty('total_http_responses_other')]
    public int $totalHttpResponsesOther;

    /**
     * @var int $totalSessions Total number of sessions handled.
     */
    #[JsonProperty('total_sessions')]
    public int $totalSessions;

    /**
     * @var int $sessionRate Average rate of sessions per second.
     */
    #[JsonProperty('session_rate')]
    public int $sessionRate;

    /**
     * @var int $currentSessions Current number of active sessions.
     */
    #[JsonProperty('current_sessions')]
    public int $currentSessions;

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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
