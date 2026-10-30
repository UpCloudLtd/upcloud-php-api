<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\StorageSortBy;
use Upcloud\Types\StorageOrderBy;

class GetStorageListByPublicAccessRequest extends JsonSerializableType
{
    /**
     * @var ?string $label Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.
     */
    public ?string $label;

    /**
     * @var ?string $search Search storage resource titles and UUIDs by partial match.
     */
    public ?string $search;

    /**
     * @var ?value-of<StorageSortBy> $sortBy Field by which to sort the results.
     */
    public ?string $sortBy;

    /**
     * @var ?value-of<StorageOrderBy> $orderBy Sort direction. Used only when `sort_by` is specified.
     */
    public ?string $orderBy;

    /**
     * @var ?int $limit Maximum number of storage resources to return.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of storage resources to skip before returning results.
     */
    public ?int $offset;

    /**
     * @param array{
     *   label?: ?string,
     *   search?: ?string,
     *   sortBy?: ?value-of<StorageSortBy>,
     *   orderBy?: ?value-of<StorageOrderBy>,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
