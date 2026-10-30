<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class GetDatabaseLogsRequest extends JsonSerializableType
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
     * @var ?string $order Sort order
     */
    public ?string $order;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   order?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->order = $values['order'] ?? null;
    }
}
