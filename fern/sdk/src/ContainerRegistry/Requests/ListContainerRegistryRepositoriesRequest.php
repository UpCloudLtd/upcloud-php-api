<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListContainerRegistryRepositoriesRequest extends JsonSerializableType
{
    /**
     * @var ?int $n How many repositories to return.
     */
    public ?int $n;

    /**
     * @var ?int $offset How many repositories to skip. The page is alphabetical. Ignored when last is set.
     */
    public ?int $offset;

    /**
     * @var ?string $last Return the OCI catalog page after this repository name. Each entry then carries only its name. Omit it to use the search page selected by n and offset.
     */
    public ?string $last;

    /**
     * @param array{
     *   n?: ?int,
     *   offset?: ?int,
     *   last?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->n = $values['n'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->last = $values['last'] ?? null;
    }
}
