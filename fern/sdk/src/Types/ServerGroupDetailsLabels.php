<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * List of labels associated with the server group.
 */
class ServerGroupDetailsLabels extends JsonSerializableType
{
    /**
     * @var array<ServerGroupLabel> $label
     */
    #[JsonProperty('label'), ArrayType([ServerGroupLabel::class])]
    public array $label;

    /**
     * @param array{
     *   label: array<ServerGroupLabel>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->label = $values['label'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
