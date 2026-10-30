<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for migration status details response.
 */
class DatabaseMigrationStatusDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $error Error message if any
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $dbname Name of the database
     */
    #[JsonProperty('dbname')]
    public ?string $dbname;

    /**
     * @var ?string $method Migration method used
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?string $status Current status of the migration
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   error?: ?string,
     *   dbname?: ?string,
     *   method?: ?string,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->dbname = $values['dbname'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
