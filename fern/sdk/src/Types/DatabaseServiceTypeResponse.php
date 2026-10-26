<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for available service types
 */
class DatabaseServiceTypeResponse extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the service type
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description The  description of the service type
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $latestAvailableVersion The latest available version of the service type
     */
    #[JsonProperty('latest_available_version')]
    public ?string $latestAvailableVersion;

    /**
     * @var ?array<DatabaseServicePlanResponse> $servicePlans
     */
    #[JsonProperty('service_plans'), ArrayType([DatabaseServicePlanResponse::class])]
    public ?array $servicePlans;

    /**
     * @var ?array<string, DatabasePropertySchemaResponse> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => DatabasePropertySchemaResponse::class])]
    public ?array $properties;

    /**
     * @var ?array<string, DatabaseDependencyResponse> $dependencies
     */
    #[JsonProperty('dependencies'), ArrayType(['string' => DatabaseDependencyResponse::class])]
    public ?array $dependencies;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     *   latestAvailableVersion?: ?string,
     *   servicePlans?: ?array<DatabaseServicePlanResponse>,
     *   properties?: ?array<string, DatabasePropertySchemaResponse>,
     *   dependencies?: ?array<string, DatabaseDependencyResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->latestAvailableVersion = $values['latestAvailableVersion'] ?? null;
        $this->servicePlans = $values['servicePlans'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->dependencies = $values['dependencies'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
