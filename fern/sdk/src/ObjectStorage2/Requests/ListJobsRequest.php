<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2UpcloneQueryParamSort;

class ListJobsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Number of entries to receive at most.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of entries to skip.
     */
    public ?int $offset;

    /**
     * @var ?value-of<ObjectStorage2UpcloneQueryParamSort> $sort Sort field. Prefix with '-' for descending order.
     */
    public ?string $sort;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   sort?: ?value-of<ObjectStorage2UpcloneQueryParamSort>,
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
