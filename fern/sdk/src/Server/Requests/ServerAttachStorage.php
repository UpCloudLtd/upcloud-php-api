<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerAttachStorageStorageDevice;
use Upcloud\Core\Json\JsonProperty;

class ServerAttachStorage extends JsonSerializableType
{
    /**
     * @var ServerAttachStorageStorageDevice $storageDevice Storage device to attach.
     */
    #[JsonProperty('storage_device')]
    public ServerAttachStorageStorageDevice $storageDevice;

    /**
     * @param array{
     *   storageDevice: ServerAttachStorageStorageDevice,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageDevice = $values['storageDevice'];
    }
}
