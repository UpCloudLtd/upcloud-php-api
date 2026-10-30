<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerLoadCdromStorageDevice;
use Upcloud\Core\Json\JsonProperty;

class ServerLoadCdrom extends JsonSerializableType
{
    /**
     * @var ServerLoadCdromStorageDevice $storageDevice Storage to load into the attached CD-ROM device.
     */
    #[JsonProperty('storage_device')]
    public ServerLoadCdromStorageDevice $storageDevice;

    /**
     * @param array{
     *   storageDevice: ServerLoadCdromStorageDevice,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageDevice = $values['storageDevice'];
    }
}
