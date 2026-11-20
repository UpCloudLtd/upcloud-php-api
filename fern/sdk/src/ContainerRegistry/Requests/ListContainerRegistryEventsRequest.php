<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ContainerRegistryEventStatus;

class ListContainerRegistryEventsRequest extends JsonSerializableType
{
    /**
     * @var ?string $action Event type to keep, such as registry.tag.create or user.create.
     */
    public ?string $action;

    /**
     * @var ?string $actor Actor identifier to keep.
     */
    public ?string $actor;

    /**
     * @var ?value-of<ContainerRegistryEventStatus> $status Outcome to keep.
     */
    public ?string $status;

    /**
     * @var ?int $limit How many events to return.
     */
    public ?int $limit;

    /**
     * @var ?int $offset How many events to skip. The feed is newest first.
     */
    public ?int $offset;

    /**
     * @param array{
     *   action?: ?string,
     *   actor?: ?string,
     *   status?: ?value-of<ContainerRegistryEventStatus>,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->actor = $values['actor'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
