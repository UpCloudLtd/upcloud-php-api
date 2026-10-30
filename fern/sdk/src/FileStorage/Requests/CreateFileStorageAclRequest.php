<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FileStorageAclCreate;

class CreateFileStorageAclRequest extends JsonSerializableType
{
    /**
     * @var FileStorageAclCreate $body
     */
    public FileStorageAclCreate $body;

    /**
     * @param array{
     *   body: FileStorageAclCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
