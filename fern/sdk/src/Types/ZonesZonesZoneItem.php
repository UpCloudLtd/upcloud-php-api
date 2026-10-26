<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ZonesZonesZoneItem extends JsonSerializableType
{
    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ZoneBooleanYesno> $public
     */
    #[JsonProperty('public')]
    public string $public;

    /**
     * @param array{
     *   description: string,
     *   id: string,
     *   public: value-of<ZoneBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
        $this->id = $values['id'];
        $this->public = $values['public'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
