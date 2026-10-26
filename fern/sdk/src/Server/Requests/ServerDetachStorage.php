<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerDetachStorage extends JsonSerializableType
{
    /**
     * @var mixed $storageDevice
     */
    #[JsonProperty('storage_device')]
    public mixed $storageDevice;

    /**
     * @param array{
     *   storageDevice: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storageDevice = $values['storageDevice'];
    }
}
