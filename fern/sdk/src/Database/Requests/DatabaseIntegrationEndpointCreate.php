<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseIntegrationEndpoint;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class DatabaseIntegrationEndpointCreate extends JsonSerializableType
{
    /**
     * @var value-of<DatabaseIntegrationEndpoint> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $name The name of the integration endpoint.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<string, mixed> $properties A key-value map of properties specific to the integration endpoint type.
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   type: value-of<DatabaseIntegrationEndpoint>,
     *   name: string,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->name = $values['name'];
        $this->properties = $values['properties'] ?? null;
    }
}
