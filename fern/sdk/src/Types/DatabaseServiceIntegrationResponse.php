<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for a service integration response.
 */
class DatabaseServiceIntegrationResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid The UUID of the service integration.
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $type The type of service integration.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $sourceName The name of the source service.
     */
    #[JsonProperty('source_name')]
    public ?string $sourceName;

    /**
     * @var ?string $sourceUuid The UUID of the source service.
     */
    #[JsonProperty('source_uuid')]
    public ?string $sourceUuid;

    /**
     * @var ?string $destinationName The name of the destination service.
     */
    #[JsonProperty('destination_name')]
    public ?string $destinationName;

    /**
     * @var ?string $destinationUuid The UUID of the destination service.
     */
    #[JsonProperty('destination_uuid')]
    public ?string $destinationUuid;

    /**
     * @var ?string $state The current state of the service integration.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?array<mixed> $stateError A list of errors related to the service integration state.
     */
    #[JsonProperty('state_error'), ArrayType(['mixed'])]
    public ?array $stateError;

    /**
     * @var ?array<DatabaseIntegrationNodeStateResponse> $nodeStates The states of individual nodes in the service integration.
     */
    #[JsonProperty('node_states'), ArrayType([DatabaseIntegrationNodeStateResponse::class])]
    public ?array $nodeStates;

    /**
     * @var ?array<string, mixed> $properties A map of additional properties for the service integration.
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   uuid?: ?string,
     *   type?: ?string,
     *   sourceName?: ?string,
     *   sourceUuid?: ?string,
     *   destinationName?: ?string,
     *   destinationUuid?: ?string,
     *   state?: ?string,
     *   stateError?: ?array<mixed>,
     *   nodeStates?: ?array<DatabaseIntegrationNodeStateResponse>,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->sourceName = $values['sourceName'] ?? null;
        $this->sourceUuid = $values['sourceUuid'] ?? null;
        $this->destinationName = $values['destinationName'] ?? null;
        $this->destinationUuid = $values['destinationUuid'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->stateError = $values['stateError'] ?? null;
        $this->nodeStates = $values['nodeStates'] ?? null;
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
