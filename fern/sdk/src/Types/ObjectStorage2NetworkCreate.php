<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating a network with optional private UUID, name, type, and family.
 */
class ObjectStorage2NetworkCreate extends JsonSerializableType
{
    /**
     * @var ?string $uuid Private network uuid. Omit for public networks.
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<ObjectStorage2NetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<ObjectStorage2NetworkFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<ObjectStorage2NetworkType>,
     *   family: value-of<ObjectStorage2NetworkFamily>,
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
