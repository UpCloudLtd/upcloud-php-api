<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Aggregated performance, availability, and traffic statistics for a load balancer backend, including member metrics and average timing metrics.
 */
class LoadBalancerBackendMetricsSeries extends JsonSerializableType
{
    /**
     * @var DateTime $startAt Timestamp marking the start of the metrics collection period.
     */
    #[JsonProperty('start_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $startAt;

    /**
     * @var DateTime $endAt Timestamp marking the end of the metrics collection period.
     */
    #[JsonProperty('end_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $endAt;

    /**
     * @var array<string> $backends List of backend identifiers included in the metrics series.
     */
    #[JsonProperty('backends'), ArrayType(['string'])]
    public array $backends;

    /**
     * @var ?int $requestBytes Total number of request bytes processed.
     */
    #[JsonProperty('request_bytes')]
    public ?int $requestBytes;

    /**
     * @var ?int $responseBytes Total number of response bytes sent.
     */
    #[JsonProperty('response_bytes')]
    public ?int $responseBytes;

    /**
     * @var ?int $deniedResponses Total number of denied responses.
     */
    #[JsonProperty('denied_responses')]
    public ?int $deniedResponses;

    /**
     * @var ?int $httpResponses1Xx Count of HTTP 1xx informational responses.
     */
    #[JsonProperty('http_responses_1xx')]
    public ?int $httpResponses1Xx;

    /**
     * @var ?int $httpResponses2Xx Count of HTTP 2xx successful responses.
     */
    #[JsonProperty('http_responses_2xx')]
    public ?int $httpResponses2Xx;

    /**
     * @var ?int $httpResponses3Xx Count of HTTP 3xx redirection responses.
     */
    #[JsonProperty('http_responses_3xx')]
    public ?int $httpResponses3Xx;

    /**
     * @var ?int $httpResponses4Xx Count of HTTP 4xx client error responses.
     */
    #[JsonProperty('http_responses_4xx')]
    public ?int $httpResponses4Xx;

    /**
     * @var ?int $httpResponses5Xx Count of HTTP 5xx server error responses.
     */
    #[JsonProperty('http_responses_5xx')]
    public ?int $httpResponses5Xx;

    /**
     * @var ?int $httpResponsesOther Count of HTTP responses outside the 1xx–5xx range.
     */
    #[JsonProperty('http_responses_other')]
    public ?int $httpResponsesOther;

    /**
     * @var ?int $sessions Total number of sessions.
     */
    #[JsonProperty('sessions')]
    public ?int $sessions;

    /**
     * @var ?int $downtime Total downtime in seconds.
     */
    #[JsonProperty('downtime')]
    public ?int $downtime;

    /**
     * @var ?int $failedChecksTransitions Number of transitions from healthy to failed health checks.
     */
    #[JsonProperty('failed_checks_transitions')]
    public ?int $failedChecksTransitions;

    /**
     * @var ?int $clientAborted Number of client-aborted connections.
     */
    #[JsonProperty('client_aborted')]
    public ?int $clientAborted;

    /**
     * @var ?int $failedConnections Number of failed connections.
     */
    #[JsonProperty('failed_connections')]
    public ?int $failedConnections;

    /**
     * @var ?int $invalidResponses Number of invalid responses.
     */
    #[JsonProperty('invalid_responses')]
    public ?int $invalidResponses;

    /**
     * @var ?int $routedRequests Number of routed requests.
     */
    #[JsonProperty('routed_requests')]
    public ?int $routedRequests;

    /**
     * @var ?int $serverAborted Number of server-aborted connections.
     */
    #[JsonProperty('server_aborted')]
    public ?int $serverAborted;

    /**
     * @var ?int $serverRedispatches Number of server redispatches.
     */
    #[JsonProperty('server_redispatches')]
    public ?int $serverRedispatches;

    /**
     * @var ?int $serverConnectionRetries Number of server connection retries.
     */
    #[JsonProperty('server_connection_retries')]
    public ?int $serverConnectionRetries;

    /**
     * @param array{
     *   startAt: DateTime,
     *   endAt: DateTime,
     *   backends: array<string>,
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
     *   downtime?: ?int,
     *   failedChecksTransitions?: ?int,
     *   clientAborted?: ?int,
     *   failedConnections?: ?int,
     *   invalidResponses?: ?int,
     *   routedRequests?: ?int,
     *   serverAborted?: ?int,
     *   serverRedispatches?: ?int,
     *   serverConnectionRetries?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startAt = $values['startAt'];
        $this->endAt = $values['endAt'];
        $this->backends = $values['backends'];
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
        $this->downtime = $values['downtime'] ?? null;
        $this->failedChecksTransitions = $values['failedChecksTransitions'] ?? null;
        $this->clientAborted = $values['clientAborted'] ?? null;
        $this->failedConnections = $values['failedConnections'] ?? null;
        $this->invalidResponses = $values['invalidResponses'] ?? null;
        $this->routedRequests = $values['routedRequests'] ?? null;
        $this->serverAborted = $values['serverAborted'] ?? null;
        $this->serverRedispatches = $values['serverRedispatches'] ?? null;
        $this->serverConnectionRetries = $values['serverConnectionRetries'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
