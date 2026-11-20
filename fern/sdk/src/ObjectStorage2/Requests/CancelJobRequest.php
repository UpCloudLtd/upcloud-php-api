<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class CancelJobRequest extends JsonSerializableType
{
    /**
     * @var ?string $validateOnly Only validate the request without applying any changes.
     */
    public ?string $validateOnly;

    /**
     * @param array{
     *   validateOnly?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->validateOnly = $values['validateOnly'] ?? null;
    }
}
