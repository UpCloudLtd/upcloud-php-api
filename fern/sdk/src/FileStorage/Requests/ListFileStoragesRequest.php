<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FileStorageQueryParamSort;

class ListFileStoragesRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of services to return.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of matching services to skip before returning results.
     */
    public ?int $offset;

    /**
     * @var ?value-of<FileStorageQueryParamSort> $sort Creation-time order for returned services.
     */
    public ?string $sort;

    /**
     * @var ?array<string> $label Filters services by label. Use a key such as `environment` to require that label, or a key-value pair such as `environment=production` for an exact value match. Label keys are matched case-insensitively; values are case-sensitive. Repeat this parameter to require all filters.
     */
    public ?array $label;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   sort?: ?value-of<FileStorageQueryParamSort>,
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
