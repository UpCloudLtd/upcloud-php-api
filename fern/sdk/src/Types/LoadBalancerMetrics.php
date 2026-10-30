<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Represents a snapshot of load balancer metrics collected by the monitoring agent, including frontend and backend statistics for a given service at a specific timestamp.
 */
class LoadBalancerMetrics extends JsonSerializableType
{
    /**
     * @var array<LoadBalancerFrontendMetricsResponse> $frontends List of frontend metrics.
     */
    #[JsonProperty('frontends'), ArrayType([LoadBalancerFrontendMetricsResponse::class])]
    public array $frontends;

    /**
     * @var array<LoadBalancerBackendMetricsResponse> $backends List of backend metrics.
     */
    #[JsonProperty('backends'), ArrayType([LoadBalancerBackendMetricsResponse::class])]
    public array $backends;

    /**
     * @param array{
     *   frontends: array<LoadBalancerFrontendMetricsResponse>,
     *   backends: array<LoadBalancerBackendMetricsResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->frontends = $values['frontends'];
        $this->backends = $values['backends'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
