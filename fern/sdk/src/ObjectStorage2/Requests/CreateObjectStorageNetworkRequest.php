<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2NetworkCreate;

class CreateObjectStorageNetworkRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2NetworkCreate $body
     */
    public ObjectStorage2NetworkCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2NetworkCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
