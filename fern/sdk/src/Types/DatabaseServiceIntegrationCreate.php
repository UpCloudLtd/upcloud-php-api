<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for creating a service integration.
 */
class DatabaseServiceIntegrationCreate extends JsonSerializableType
{
    /**
     * @var value-of<DatabaseServiceIntegration> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $destinationUuid The UUID of the destination where the service integration will send data.
     */
    #[JsonProperty('destination_uuid')]
    public ?string $destinationUuid;

    /**
     * @var ?array<string, mixed> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   type: value-of<DatabaseServiceIntegration>,
     *   destinationUuid?: ?string,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->destinationUuid = $values['destinationUuid'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
