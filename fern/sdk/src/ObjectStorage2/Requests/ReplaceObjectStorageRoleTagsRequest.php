<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2TagListRequestItem;

class ReplaceObjectStorageRoleTagsRequest extends JsonSerializableType
{
    /**
     * @var array<ObjectStorage2TagListRequestItem> $body
     */
    public array $body;

    /**
     * @param array{
     *   body: array<ObjectStorage2TagListRequestItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
