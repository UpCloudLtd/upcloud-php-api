<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Database\Types\DatabaseConnectionPoolCreatePoolMode;

class DatabaseConnectionPoolCreate extends JsonSerializableType
{
    /**
     * @var string $database Database
     */
    #[JsonProperty('database')]
    public string $database;

    /**
     * @var value-of<DatabaseConnectionPoolCreatePoolMode> $poolMode Connection Pool mode
     */
    #[JsonProperty('pool_mode')]
    public string $poolMode;

    /**
     * @var string $poolName Connection Pool name
     */
    #[JsonProperty('pool_name')]
    public string $poolName;

    /**
     * @var int $poolSize Connection Pool size
     */
    #[JsonProperty('pool_size')]
    public int $poolSize;

    /**
     * @var ?string $username Connection Pool username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   database: string,
     *   poolMode: value-of<DatabaseConnectionPoolCreatePoolMode>,
     *   poolName: string,
     *   poolSize: int,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->database = $values['database'];
        $this->poolMode = $values['poolMode'];
        $this->poolName = $values['poolName'];
        $this->poolSize = $values['poolSize'];
        $this->username = $values['username'] ?? null;
    }
}
