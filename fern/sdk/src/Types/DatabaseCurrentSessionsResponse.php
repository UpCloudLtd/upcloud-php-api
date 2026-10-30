<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for representing current sessions for various services
 */
class DatabaseCurrentSessionsResponse extends JsonSerializableType
{
    /**
     * @var ?array<DatabasePgCurrentSessionResponse> $pg
     */
    #[JsonProperty('pg'), ArrayType([DatabasePgCurrentSessionResponse::class])]
    public ?array $pg;

    /**
     * @var ?array<DatabaseMysqlCurrentSessionResponse> $mysql
     */
    #[JsonProperty('mysql'), ArrayType([DatabaseMysqlCurrentSessionResponse::class])]
    public ?array $mysql;

    /**
     * @var ?array<DatabaseRedisValkeyCurrentSessionResponse> $redis
     */
    #[JsonProperty('redis'), ArrayType([DatabaseRedisValkeyCurrentSessionResponse::class])]
    public ?array $redis;

    /**
     * @var ?array<DatabaseRedisValkeyCurrentSessionResponse> $valkey
     */
    #[JsonProperty('valkey'), ArrayType([DatabaseRedisValkeyCurrentSessionResponse::class])]
    public ?array $valkey;

    /**
     * @param array{
     *   pg?: ?array<DatabasePgCurrentSessionResponse>,
     *   mysql?: ?array<DatabaseMysqlCurrentSessionResponse>,
     *   redis?: ?array<DatabaseRedisValkeyCurrentSessionResponse>,
     *   valkey?: ?array<DatabaseRedisValkeyCurrentSessionResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pg = $values['pg'] ?? null;
        $this->mysql = $values['mysql'] ?? null;
        $this->redis = $values['redis'] ?? null;
        $this->valkey = $values['valkey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
