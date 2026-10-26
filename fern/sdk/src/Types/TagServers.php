<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * List of servers associated with the tag.
 */
class TagServers extends JsonSerializableType
{
    /**
     * @var ?array<string> $server
     */
    #[JsonProperty('server'), ArrayType(['string'])]
    public ?array $server;

    /**
     * @param array{
     *   server?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->server = $values['server'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
