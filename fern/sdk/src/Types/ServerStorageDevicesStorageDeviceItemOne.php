<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class ServerStorageDevicesStorageDeviceItemOne extends JsonSerializableType
{
    /**
     * @var value-of<ServerStorageDevicesStorageDeviceItemOneAction> $action Method used to create, clone, or attach storage for the device
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var (
     *    int
     *   |string
     * )|null $size Requested block storage size in gigabytes
     */
    #[JsonProperty('size'), Union('integer', 'string', 'null')]
    public int|string|null $size;

    /**
     * @var string $storage UUID of the storage resource to attach or clone
     */
    #[JsonProperty('storage')]
    public string $storage;

    /**
     * @param array{
     *   action: value-of<ServerStorageDevicesStorageDeviceItemOneAction>,
     *   storage: string,
     *   size?: (
     *    int
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->size = $values['size'] ?? null;
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
