<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for PostgreSQL access control response.
 */
class DatabasePgAccessControlResponse extends JsonSerializableType
{
    /**
     * @var ?bool $allowReplication If true, allows replication connections.
     */
    #[JsonProperty('allow_replication')]
    public ?bool $allowReplication;

    /**
     * @param array{
     *   allowReplication?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowReplication = $values['allowReplication'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
