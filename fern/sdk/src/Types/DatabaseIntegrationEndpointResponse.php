<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for an integration endpoint response.
 */
class DatabaseIntegrationEndpointResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid The universally unique identifier (UUID) of the integration endpoint.
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name The name of the integration endpoint.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $type The type of the integration endpoint.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<string, mixed> $properties A key-value map of properties specific to the integration endpoint type.
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   type?: ?string,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'] ?? null;
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
