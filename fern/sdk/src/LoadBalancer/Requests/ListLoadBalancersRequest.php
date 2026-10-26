<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerSortServicesParameter;

class ListLoadBalancersRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Number of entries to receive at most.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Offset for retrieved results.
     */
    public ?int $offset;

    /**
     * @var ?value-of<LoadBalancerSortServicesParameter> $sort Sort resources by field. Prefix with '-' for descending order.
     */
    public ?string $sort;

    /**
     * @var ?array<string> $label Filter resources by label. Can be provided multiple times for multiple labels. Format: 'key=value' for exact match or 'key' for existence check.
     */
    public ?array $label;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   sort?: ?value-of<LoadBalancerSortServicesParameter>,
     *   label?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->label = $values['label'] ?? null;
    }
}
