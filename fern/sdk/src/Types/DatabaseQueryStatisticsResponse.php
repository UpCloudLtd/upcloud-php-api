<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for query statistics response.
 */
class DatabaseQueryStatisticsResponse extends JsonSerializableType
{
    /**
     * @var ?array<DatabaseQueryStatisticsMysqlResponse> $mysql
     */
    #[JsonProperty('mysql'), ArrayType([DatabaseQueryStatisticsMysqlResponse::class])]
    public ?array $mysql;

    /**
     * @var ?array<DatabaseQueryStatisticsPgResponse> $pg
     */
    #[JsonProperty('pg'), ArrayType([DatabaseQueryStatisticsPgResponse::class])]
    public ?array $pg;

    /**
     * @param array{
     *   mysql?: ?array<DatabaseQueryStatisticsMysqlResponse>,
     *   pg?: ?array<DatabaseQueryStatisticsPgResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mysql = $values['mysql'] ?? null;
        $this->pg = $values['pg'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
