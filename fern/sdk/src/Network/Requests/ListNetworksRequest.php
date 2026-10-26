<?php

namespace Upcloud\Network\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkLabel;

class ListNetworksRequest extends JsonSerializableType
{
    /**
     * @var ?NetworkLabel $label Filter networks by labels.
     */
    public ?NetworkLabel $label;

    /**
     * @param array{
     *   label?: ?NetworkLabel,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
    }
}
