<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating a network.
 */
class DatabaseNetworkCreate extends JsonSerializableType
{
    /**
     * @var ?string $uuid Optional UUID for the network. If not provided, a new UUID will be generated.
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<DatabaseNetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<DatabaseNetworkFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<DatabaseNetworkType>,
     *   family: value-of<DatabaseNetworkFamily>,
     *   uuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'];
        $this->type = $values['type'];
        $this->family = $values['family'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
