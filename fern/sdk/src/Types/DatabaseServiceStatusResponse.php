<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for representing the status of a service instance.
 */
class DatabaseServiceStatusResponse extends JsonSerializableType
{
    /**
     * @var ?string $state The service status indicates the service's current operational status.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @param array{
     *   state?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->state = $values['state'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
