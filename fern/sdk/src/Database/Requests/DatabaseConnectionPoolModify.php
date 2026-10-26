<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Database\Types\DatabaseConnectionPoolModifyPoolMode;

class DatabaseConnectionPoolModify extends JsonSerializableType
{
    /**
     * @var ?string $database Database
     */
    #[JsonProperty('database')]
    public ?string $database;

    /**
     * @var ?value-of<DatabaseConnectionPoolModifyPoolMode> $poolMode Connection Pool mode
     */
    #[JsonProperty('pool_mode')]
    public ?string $poolMode;

    /**
     * @var ?int $poolSize Connection Pool size
     */
    #[JsonProperty('pool_size')]
    public ?int $poolSize;

    /**
     * @var ?string $username Connection Pool username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   database?: ?string,
     *   poolMode?: ?value-of<DatabaseConnectionPoolModifyPoolMode>,
     *   poolSize?: ?int,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->database = $values['database'] ?? null;
        $this->poolMode = $values['poolMode'] ?? null;
        $this->poolSize = $values['poolSize'] ?? null;
        $this->username = $values['username'] ?? null;
    }
}
