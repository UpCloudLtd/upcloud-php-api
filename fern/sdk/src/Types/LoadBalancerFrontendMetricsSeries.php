<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Aggregated time-series metrics for load balancer frontends, representing cumulative statistics between a start and end timestamp across one or more frontend instances.
 */
class LoadBalancerFrontendMetricsSeries extends JsonSerializableType
{
    /**
     * @var DateTime $startAt Timestamp marking the beginning of the metrics aggregation period.
     */
    #[JsonProperty('start_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $startAt;

    /**
     * @var DateTime $endAt Timestamp marking the end of the metrics aggregation period.
     */
    #[JsonProperty('end_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $endAt;

    /**
     * @var array<string> $frontends List of frontend names or identifiers included in the aggregated data.
     */
    #[JsonProperty('frontends'), ArrayType(['string'])]
    public array $frontends;

    /**
     * @var ?int $deniedConnections Total number of denied frontend connections within the time range.
     */
    #[JsonProperty('denied_connections')]
    public ?int $deniedConnections;

    /**
     * @var ?int $deniedSessions Total number of denied sessions during the period.
     */
    #[JsonProperty('denied_sessions')]
    public ?int $deniedSessions;

    /**
     * @var ?int $invalidRequests Number of malformed or invalid HTTP requests received.
     */
    #[JsonProperty('invalid_requests')]
    public ?int $invalidRequests;

    /**
     * @var ?int $requestBytes Total size of incoming request payloads, in bytes.
     */
    #[JsonProperty('request_bytes')]
    public ?int $requestBytes;

    /**
     * @var ?int $responseBytes Total size of outgoing response payloads, in bytes.
     */
    #[JsonProperty('response_bytes')]
    public ?int $responseBytes;

    /**
     * @var ?int $deniedResponses Number of HTTP responses that were denied or rejected.
     */
    #[JsonProperty('denied_responses')]
    public ?int $deniedResponses;

    /**
     * @var ?int $httpResponses1Xx Count of informational (1xx) HTTP responses.
     */
    #[JsonProperty('http_responses_1xx')]
    public ?int $httpResponses1Xx;

    /**
     * @var ?int $httpResponses2Xx Count of successful (2xx) HTTP responses.
     */
    #[JsonProperty('http_responses_2xx')]
    public ?int $httpResponses2Xx;

    /**
     * @var ?int $httpResponses3Xx Count of redirection (3xx) HTTP responses.
     */
    #[JsonProperty('http_responses_3xx')]
    public ?int $httpResponses3Xx;

    /**
     * @var ?int $httpResponses4Xx Count of client error (4xx) HTTP responses.
     */
    #[JsonProperty('http_responses_4xx')]
    public ?int $httpResponses4Xx;

    /**
     * @var ?int $httpResponses5Xx Count of server error (5xx) HTTP responses.
     */
    #[JsonProperty('http_responses_5xx')]
    public ?int $httpResponses5Xx;

    /**
     * @var ?int $httpResponsesOther Count of HTTP responses with codes outside the 1xx–5xx range.
     */
    #[JsonProperty('http_responses_other')]
    public ?int $httpResponsesOther;

    /**
     * @var ?int $sessions Total number of frontend sessions handled.
     */
    #[JsonProperty('sessions')]
    public ?int $sessions;

    /**
     * @var ?int $httpRequests Total number of HTTP requests processed during the aggregation period.
     */
    #[JsonProperty('http_requests')]
    public ?int $httpRequests;

    /**
     * @var ?int $deniedRequests Total number of HTTP requests denied.
     */
    #[JsonProperty('denied_requests')]
    public ?int $deniedRequests;

    /**
     * @var ?int $interceptedRequests Number of requests intercepted before reaching the backend.
     */
    #[JsonProperty('intercepted_requests')]
    public ?int $interceptedRequests;

    /**
     * @param array{
     *   startAt: DateTime,
     *   endAt: DateTime,
     *   frontends: array<string>,
     *   deniedConnections?: ?int,
     *   deniedSessions?: ?int,
     *   invalidRequests?: ?int,
     *   requestBytes?: ?int,
     *   responseBytes?: ?int,
     *   deniedResponses?: ?int,
     *   httpResponses1Xx?: ?int,
     *   httpResponses2Xx?: ?int,
     *   httpResponses3Xx?: ?int,
     *   httpResponses4Xx?: ?int,
     *   httpResponses5Xx?: ?int,
     *   httpResponsesOther?: ?int,
     *   sessions?: ?int,
     *   httpRequests?: ?int,
     *   deniedRequests?: ?int,
     *   interceptedRequests?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startAt = $values['startAt'];
        $this->endAt = $values['endAt'];
        $this->frontends = $values['frontends'];
        $this->deniedConnections = $values['deniedConnections'] ?? null;
        $this->deniedSessions = $values['deniedSessions'] ?? null;
        $this->invalidRequests = $values['invalidRequests'] ?? null;
        $this->requestBytes = $values['requestBytes'] ?? null;
        $this->responseBytes = $values['responseBytes'] ?? null;
        $this->deniedResponses = $values['deniedResponses'] ?? null;
        $this->httpResponses1Xx = $values['httpResponses1Xx'] ?? null;
        $this->httpResponses2Xx = $values['httpResponses2Xx'] ?? null;
        $this->httpResponses3Xx = $values['httpResponses3Xx'] ?? null;
        $this->httpResponses4Xx = $values['httpResponses4Xx'] ?? null;
        $this->httpResponses5Xx = $values['httpResponses5Xx'] ?? null;
        $this->httpResponsesOther = $values['httpResponsesOther'] ?? null;
        $this->sessions = $values['sessions'] ?? null;
        $this->httpRequests = $values['httpRequests'] ?? null;
        $this->deniedRequests = $values['deniedRequests'] ?? null;
        $this->interceptedRequests = $values['interceptedRequests'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
