<?php

namespace Upcloud\Router\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\RouterLabel;

class ListRoutersRequest extends JsonSerializableType
{
    /**
     * @var ?RouterLabel $label A label filter. Can be specified multiple times to create an AND condition. Format: label=key:value
     */
    public ?RouterLabel $label;

    /**
     * @param array{
     *   label?: ?RouterLabel,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
    }
}
