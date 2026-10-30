<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\AttachStorageRequestStorageDevice;
use Upcloud\Core\Json\JsonProperty;

class AttachStorageRequest extends JsonSerializableType
{
    /**
     * @var AttachStorageRequestStorageDevice $storageDevice Parameters for attaching this storage resource to a Cloud Server in the same zone.
     */
    #[JsonProperty('storage_device')]
    public AttachStorageRequestStorageDevice $storageDevice;

    /**
     * @param array{
     *   storageDevice: AttachStorageRequestStorageDevice,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageDevice = $values['storageDevice'];
    }
}
