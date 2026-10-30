<?php

namespace Upcloud\ServerGroup\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerGroupLabel;

class ListServerGroupsRequest extends JsonSerializableType
{
    /**
     * @var ?ServerGroupLabel $label A label filter to apply. Format: key:value. Multiple labels can be specified by repeating the parameter.
     */
    public ?ServerGroupLabel $label;

    /**
     * @param array{
     *   label?: ?ServerGroupLabel,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
    }
}
