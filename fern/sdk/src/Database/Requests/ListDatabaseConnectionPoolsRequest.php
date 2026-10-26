<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListDatabaseConnectionPoolsRequest extends JsonSerializableType
{
    /**
     * @var ?string $sort Order of returned results.
     */
    public ?string $sort;

    /**
     * @param array{
     *   sort?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sort = $values['sort'] ?? null;
    }
}
