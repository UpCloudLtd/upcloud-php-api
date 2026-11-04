<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class ServerStorageDevicesStorageDeviceItemZero extends JsonSerializableType
{
    /**
     * @var value-of<ServerStorageDevicesStorageDeviceItemZeroAction> $action Method used to create, clone, or attach storage for the device
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var (
     *    int
     *   |string
     * ) $size Requested block storage size in gigabytes
     */
    #[JsonProperty('size'), Union('integer', 'string')]
    public int|string $size;

    /**
     * @var ?string $storage UUID of the storage resource to attach or clone
     */
    #[JsonProperty('storage')]
    public ?string $storage;

    /**
     * @param array{
     *   action: value-of<ServerStorageDevicesStorageDeviceItemZeroAction>,
     *   size: (
     *    int
     *   |string
     * ),
     *   storage?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->size = $values['size'];
        $this->storage = $values['storage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
