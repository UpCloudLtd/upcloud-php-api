<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Cloud Servers to which the storage resource is attached.
 */
class StorageDetailsServers extends JsonSerializableType
{
    /**
     * @var array<string> $server UUIDs of Cloud Servers to which the storage resource is attached.
     */
    #[JsonProperty('server'), ArrayType(['string'])]
    public array $server;

    /**
     * @param array{
     *   server: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
