<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2LabelCreate;

class CreateObjectStorageLabelRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2LabelCreate $body
     */
    public ObjectStorage2LabelCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2LabelCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
