<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for the state of a node in a service.
 */
class DatabaseNodeStateResponse extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the node.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $role Role of the node in the service.
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?string $state Current state of the node.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?array<DatabaseNodeProgressUpdateResponse> $progressUpdates
     */
    #[JsonProperty('progress_updates'), ArrayType([DatabaseNodeProgressUpdateResponse::class])]
    public ?array $progressUpdates;

    /**
     * @param array{
     *   name?: ?string,
     *   role?: ?string,
     *   state?: ?string,
     *   progressUpdates?: ?array<DatabaseNodeProgressUpdateResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->progressUpdates = $values['progressUpdates'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
