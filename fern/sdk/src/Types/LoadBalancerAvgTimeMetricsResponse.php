<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents average timing statistics for backend performance, including connection establishment, queuing, server response, and total transaction times, all measured in milliseconds.
 */
class LoadBalancerAvgTimeMetricsResponse extends JsonSerializableType
{
    /**
     * @var int $avgConnectionTimeMs Average time taken to establish a connection in milliseconds.
     */
    #[JsonProperty('avg_connection_time_ms')]
    public int $avgConnectionTimeMs;

    /**
     * @var int $avgQueueTimeMs Average time spent in queue before being processed, in milliseconds.
     */
    #[JsonProperty('avg_queue_time_ms')]
    public int $avgQueueTimeMs;

    /**
     * @var int $avgServerResponseTimeMs Average server response time in milliseconds.
     */
    #[JsonProperty('avg_server_response_time_ms')]
    public int $avgServerResponseTimeMs;

    /**
     * @var int $avgTotalTimeMs Average total time from connection start to response completion, in milliseconds.
     */
    #[JsonProperty('avg_total_time_ms')]
    public int $avgTotalTimeMs;

    /**
     * @param array{
     *   avgConnectionTimeMs: int,
     *   avgQueueTimeMs: int,
     *   avgServerResponseTimeMs: int,
     *   avgTotalTimeMs: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->avgConnectionTimeMs = $values['avgConnectionTimeMs'];
        $this->avgQueueTimeMs = $values['avgQueueTimeMs'];
        $this->avgServerResponseTimeMs = $values['avgServerResponseTimeMs'];
        $this->avgTotalTimeMs = $values['avgTotalTimeMs'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
