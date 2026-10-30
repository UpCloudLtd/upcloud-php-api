<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerMetricsSortParameter;

class GetLoadBalancerMemberMetricsSeriesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<LoadBalancerMetricsSortParameter> $sort Sort metrics by field. Prefix with '-' for descending order.
     */
    public ?string $sort;

    /**
     * @param array{
     *   sort?: ?value-of<LoadBalancerMetricsSortParameter>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sort = $values['sort'] ?? null;
    }
}
