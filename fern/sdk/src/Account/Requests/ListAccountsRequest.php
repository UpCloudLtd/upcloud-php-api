<?php

namespace Upcloud\Account\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?string $label Filter by label key or key-value pair. Repeat the parameter to require all labels. Label keys are matched case-insensitively.
     */
    public ?string $label;

    /**
     * @param array{
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
    }
}
