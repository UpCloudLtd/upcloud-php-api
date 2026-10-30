<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a connection pool response.
 */
class DatabaseConnectionPoolResponse extends JsonSerializableType
{
    /**
     * @var ?string $connectionUri The connection URI of the connection pool.
     */
    #[JsonProperty('connection_uri')]
    public ?string $connectionUri;

    /**
     * @var ?string $database The database name associated with the connection pool.
     */
    #[JsonProperty('database')]
    public ?string $database;

    /**
     * @var ?string $poolMode The mode of the connection pool.
     */
    #[JsonProperty('pool_mode')]
    public ?string $poolMode;

    /**
     * @var ?string $poolName The name of the connection pool.
     */
    #[JsonProperty('pool_name')]
    public ?string $poolName;

    /**
     * @var ?int $poolSize The size of the connection pool.
     */
    #[JsonProperty('pool_size')]
    public ?int $poolSize;

    /**
     * @var ?string $username The username for the connection pool
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   connectionUri?: ?string,
     *   database?: ?string,
     *   poolMode?: ?string,
     *   poolName?: ?string,
     *   poolSize?: ?int,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->connectionUri = $values['connectionUri'] ?? null;
        $this->database = $values['database'] ?? null;
        $this->poolMode = $values['poolMode'] ?? null;
        $this->poolName = $values['poolName'] ?? null;
        $this->poolSize = $values['poolSize'] ?? null;
        $this->username = $values['username'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
