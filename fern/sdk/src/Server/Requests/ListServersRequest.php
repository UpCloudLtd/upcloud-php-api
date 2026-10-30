<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ListServersRequestState;
use Upcloud\Server\Types\ListServersRequestSortBy;
use Upcloud\Server\Types\ListServersRequestOrderBy;

class ListServersRequest extends JsonSerializableType
{
    /**
     * @var ?string $label Filter by label key or key-value pair using "key" or "key=value". Repeat the parameter to require all labels.
     */
    public ?string $label;

    /**
     * @var ?string $uuid Filter by Cloud Server UUID. Repeat the parameter to match any of up to five UUIDs.
     */
    public ?string $uuid;

    /**
     * @var ?int $host Filter by Private Cloud host ID. Repeat the parameter to match any of up to five hosts.
     */
    public ?int $host;

    /**
     * @var ?string $device Filter by attached device using "type=gpu" or "type!=gpu". Repeat the parameter for up to five filters.
     */
    public ?string $device;

    /**
     * @var ?value-of<ListServersRequestState> $state Filter by the current Cloud Server state.
     */
    public ?string $state;

    /**
     * @var ?string $tag Filter by tag name. Separate names with commas to match any tag or colons to require all tags.
     */
    public ?string $tag;

    /**
     * @var ?string $search Search UUIDs, titles, hostnames, zones, zone descriptions, IP addresses, tags, and template names.
     */
    public ?string $search;

    /**
     * @var ?value-of<ListServersRequestSortBy> $sortBy Field to sort by.
     */
    public ?string $sortBy;

    /**
     * @var ?value-of<ListServersRequestOrderBy> $orderBy Sort direction. Only applied when sort_by is specified.
     */
    public ?string $orderBy;

    /**
     * @var ?int $limit Maximum number of Cloud Servers to return.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of Cloud Servers to skip.
     */
    public ?int $offset;

    /**
     * @param array{
     *   label?: ?string,
     *   uuid?: ?string,
     *   host?: ?int,
     *   device?: ?string,
     *   state?: ?value-of<ListServersRequestState>,
     *   tag?: ?string,
     *   search?: ?string,
     *   sortBy?: ?value-of<ListServersRequestSortBy>,
     *   orderBy?: ?value-of<ListServersRequestOrderBy>,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
        $this->host = $values['host'] ?? null;
        $this->device = $values['device'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
