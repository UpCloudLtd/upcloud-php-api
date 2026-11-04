<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerStorageDevicesStorageDeviceItemActionStorage extends JsonSerializableType
{
    /**
     * @var string $storage UUID of the storage resource to attach or clone
     */
    #[JsonProperty('storage')]
    public string $storage;

    /**
     * @param array{
     *   storage: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
