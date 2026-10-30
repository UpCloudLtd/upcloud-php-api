<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ZoneVlansZoneVlansVlanItem extends JsonSerializableType
{
    /**
     * @var int $id
     */
    #[JsonProperty('id')]
    public int $id;

    /**
     * @var string $access
     */
    #[JsonProperty('access')]
    public string $access;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var int $default
     */
    #[JsonProperty('default')]
    public int $default;

    /**
     * @param array{
     *   id: int,
     *   access: string,
     *   description: string,
     *   default: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->access = $values['access'];
        $this->description = $values['description'];
        $this->default = $values['default'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
