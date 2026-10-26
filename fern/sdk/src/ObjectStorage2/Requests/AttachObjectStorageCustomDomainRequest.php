<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2CustomDomainCreate;

class AttachObjectStorageCustomDomainRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2CustomDomainCreate $body
     */
    public ObjectStorage2CustomDomainCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2CustomDomainCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
