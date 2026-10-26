<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for representing the state of an integration node
 */
class DatabaseIntegrationNodeStateResponse extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the integration node
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $status The current status of the node
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<mixed> $errors A list of errors encountered by the node
     */
    #[JsonProperty('errors'), ArrayType(['mixed'])]
    public ?array $errors;

    /**
     * @var ?string $likelyErrorCause The likely cause of the error
     */
    #[JsonProperty('likely_error_cause')]
    public ?string $likelyErrorCause;

    /**
     * @param array{
     *   name?: ?string,
     *   status?: ?string,
     *   errors?: ?array<mixed>,
     *   likelyErrorCause?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->likelyErrorCause = $values['likelyErrorCause'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
