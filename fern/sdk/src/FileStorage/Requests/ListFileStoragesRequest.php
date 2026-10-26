<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FileStorageQueryParamSort;

class ListFileStoragesRequest extends JsonSerializableType
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
     * @var ?value-of<FileStorageQueryParamSort> $sort Order of returned results.
     */
    public ?string $sort;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   sort?: ?value-of<FileStorageQueryParamSort>,
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
