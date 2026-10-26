<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListLoadBalancerCertificateBundlesRequest extends JsonSerializableType
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
     * @var ?array<string> $label Filter resources by label. Can be provided multiple times for multiple labels. Format: 'key=value' for exact match or 'key' for existence check.
     */
    public ?array $label;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   label?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->label = $values['label'] ?? null;
    }
}
