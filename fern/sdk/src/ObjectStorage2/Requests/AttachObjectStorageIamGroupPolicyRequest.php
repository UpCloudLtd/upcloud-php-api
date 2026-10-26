<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2PolicyAttachmentCreate;

class AttachObjectStorageIamGroupPolicyRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2PolicyAttachmentCreate $body
     */
    public ObjectStorage2PolicyAttachmentCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2PolicyAttachmentCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
