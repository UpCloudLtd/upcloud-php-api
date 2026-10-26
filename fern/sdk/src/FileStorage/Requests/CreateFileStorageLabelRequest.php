<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FileStorageLabelCreate;

class CreateFileStorageLabelRequest extends JsonSerializableType
{
    /**
     * @var FileStorageLabelCreate $body
     */
    public FileStorageLabelCreate $body;

    /**
     * @param array{
     *   body: FileStorageLabelCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
