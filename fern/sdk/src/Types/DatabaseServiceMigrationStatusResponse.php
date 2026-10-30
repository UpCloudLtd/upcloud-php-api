<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for service migration status
 */
class DatabaseServiceMigrationStatusResponse extends JsonSerializableType
{
    /**
     * @var ?string $error Error message if any
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $method Migration method used
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?int $secondsBehindMaster Seconds behind master
     */
    #[JsonProperty('seconds_behind_master')]
    public ?int $secondsBehindMaster;

    /**
     * @var ?bool $sourceActive Is source active
     */
    #[JsonProperty('source_active')]
    public ?bool $sourceActive;

    /**
     * @var ?string $status Current status of the migration
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<DatabaseMigrationStatusDetailsResponse> $databases
     */
    #[JsonProperty('databases'), ArrayType([DatabaseMigrationStatusDetailsResponse::class])]
    public ?array $databases;

    /**
     * @param array{
     *   error?: ?string,
     *   method?: ?string,
     *   secondsBehindMaster?: ?int,
     *   sourceActive?: ?bool,
     *   status?: ?string,
     *   databases?: ?array<DatabaseMigrationStatusDetailsResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->secondsBehindMaster = $values['secondsBehindMaster'] ?? null;
        $this->sourceActive = $values['sourceActive'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->databases = $values['databases'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
