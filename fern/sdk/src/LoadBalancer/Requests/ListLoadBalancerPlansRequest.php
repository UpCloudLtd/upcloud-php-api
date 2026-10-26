<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListLoadBalancerPlansRequest extends JsonSerializableType
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
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
