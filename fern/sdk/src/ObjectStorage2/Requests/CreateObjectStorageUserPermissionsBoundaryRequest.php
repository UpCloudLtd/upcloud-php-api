<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2PermissionsBoundaryCreate;

class CreateObjectStorageUserPermissionsBoundaryRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2PermissionsBoundaryCreate $body
     */
    public ObjectStorage2PermissionsBoundaryCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2PermissionsBoundaryCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
