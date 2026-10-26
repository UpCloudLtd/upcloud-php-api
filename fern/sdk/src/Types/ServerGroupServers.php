<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * List of server UUIDs in the server group
 */
class ServerGroupServers extends JsonSerializableType
{
    /**
     * @var array<string> $servers
     */
    #[JsonProperty('servers'), ArrayType(['string'])]
    public array $servers;

    /**
     * @param array{
     *   servers: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->servers = $values['servers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
