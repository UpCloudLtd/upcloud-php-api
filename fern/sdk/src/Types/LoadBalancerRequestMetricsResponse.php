<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents basic HTTP request statistics collected by the load balancer, including the total number of processed, denied, and intercepted requests.
 */
class LoadBalancerRequestMetricsResponse extends JsonSerializableType
{
    /**
     * @var int $totalHttpRequests Total number of HTTP requests processed.
     */
    #[JsonProperty('total_http_requests')]
    public int $totalHttpRequests;

    /**
     * @var int $totalDeniedRequests Total number of denied HTTP requests.
     */
    #[JsonProperty('total_denied_requests')]
    public int $totalDeniedRequests;

    /**
     * @var int $totalInterceptedRequests Total number of intercepted HTTP requests by internal rules or actions.
     */
    #[JsonProperty('total_intercepted_requests')]
    public int $totalInterceptedRequests;

    /**
     * @param array{
     *   totalHttpRequests: int,
     *   totalDeniedRequests: int,
     *   totalInterceptedRequests: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalHttpRequests = $values['totalHttpRequests'];
        $this->totalDeniedRequests = $values['totalDeniedRequests'];
        $this->totalInterceptedRequests = $values['totalInterceptedRequests'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
