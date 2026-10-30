<?php

namespace Upcloud\Traits;

use Upcloud\Core\Json\JsonProperty;

/**
 * Represents basic HTTP request statistics collected by the load balancer, including the total number of processed, denied, and intercepted requests.
 *
 * @property int $totalHttpRequests
 * @property int $totalDeniedRequests
 * @property int $totalInterceptedRequests
 */
trait LoadBalancerRequestMetricsResponse
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
}
