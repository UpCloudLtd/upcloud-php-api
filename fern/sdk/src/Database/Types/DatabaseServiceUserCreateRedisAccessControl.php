<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Redis access control settings
 */
class DatabaseServiceUserCreateRedisAccessControl extends JsonSerializableType
{
    /**
     * @var ?array<string> $categories List of categories for Redis ACL
     */
    #[JsonProperty('categories'), ArrayType(['string'])]
    public ?array $categories;

    /**
     * @var ?array<string> $channels List of channels for Redis ACL
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    public ?array $channels;

    /**
     * @var ?array<string> $commands List of commands for Redis ACL
     */
    #[JsonProperty('commands'), ArrayType(['string'])]
    public ?array $commands;

    /**
     * @var ?array<string> $keys List of keys for Redis ACL
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
