<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2InlinePolicyCreate;

class CreateObjectStorageUserInlinePolicyRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2InlinePolicyCreate $body
     */
    public ObjectStorage2InlinePolicyCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2InlinePolicyCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
