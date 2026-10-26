<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\GatewayQueryParamSortServices;

class ListGatewayServicesRequest extends JsonSerializableType
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
     * @var ?value-of<GatewayQueryParamSortServices> $sort Sort resources by field. Prefix with '-' for descending order.
     */
    public ?string $sort;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   sort?: ?value-of<GatewayQueryParamSortServices>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }
}
