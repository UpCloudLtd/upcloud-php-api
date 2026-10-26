<?php

namespace Upcloud\AccountTokens\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListTokensRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit How many tokens to return at per page
     */
    public ?int $limit;

    /**
     * @var ?int $offset Offset to start listing the tokens from
     */
    public ?int $offset;

    /**
     * @var ?bool $gui Filter tokens based on GUI flag (true or false). Default is no value, i.e. no filtering and all tokens are returned.
     */
    public ?bool $gui;

    /**
     * @var ?string $sort Comma-separated list of fields to sort by. Prefix with '+' for ascending or '-' for descending order. Supported fields: created_at, expires_at, last_used_at, name. Example: sort=+name,-created_at. If no prefix is given, descending is assumed. Follows OpenAPI collectionFormat 'csv'.
     */
    public ?string $sort;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   gui?: ?bool,
     *   sort?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->gui = $values['gui'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }
}
