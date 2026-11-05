<?php

namespace Upcloud\Host\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Host properties to modify.
 */
class HostModifyHost extends JsonSerializableType
{
    /**
     * @var mixed $description
     */
    #[JsonProperty('description')]
    public mixed $description;

    /**
     * @param array{
     *   description: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
