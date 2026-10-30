<?php

namespace Upcloud\FileStorage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FileStorageNetworkCreate;

class CreateFileStorageNetworkRequest extends JsonSerializableType
{
    /**
     * @var FileStorageNetworkCreate $body
     */
    public FileStorageNetworkCreate $body;

    /**
     * @param array{
     *   body: FileStorageNetworkCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
