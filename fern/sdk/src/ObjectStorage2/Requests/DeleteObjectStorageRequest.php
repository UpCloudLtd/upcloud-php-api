<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class DeleteObjectStorageRequest extends JsonSerializableType
{
    /**
     * @var ?bool $force If the parameter is provided, the deletion process starts even if the service is not empty.
     */
    public ?bool $force;

    /**
     * @param array{
     *   force?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->force = $values['force'] ?? null;
    }
}
