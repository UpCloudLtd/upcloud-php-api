<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FileStorageShareCreate;

class CreateFileStorageShareRequest extends JsonSerializableType
{
    /**
     * @var FileStorageShareCreate $body
     */
    public FileStorageShareCreate $body;

    /**
     * @param array{
     *   body: FileStorageShareCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
