<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for Valkey user access control response
 */
class DatabaseValkeyAccessControlResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $categories List of command categories the user has access to.
     */
    #[JsonProperty('categories'), ArrayType(['string'])]
    public ?array $categories;

    /**
     * @var ?array<string> $channels List of Pub/Sub channels the user has access to.
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    public ?array $channels;

    /**
     * @var ?array<string> $commands List of specific commands the user has access to.
     */
    #[JsonProperty('commands'), ArrayType(['string'])]
    public ?array $commands;

    /**
     * @var ?array<string> $keys List of key patterns the user has access to.
     */
    #[JsonProperty('keys'), ArrayType(['string'])]
    public ?array $keys;

    /**
     * @param array{
     *   categories?: ?array<string>,
     *   channels?: ?array<string>,
     *   commands?: ?array<string>,
     *   keys?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->categories = $values['categories'] ?? null;
        $this->channels = $values['channels'] ?? null;
        $this->commands = $values['commands'] ?? null;
        $this->keys = $values['keys'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
