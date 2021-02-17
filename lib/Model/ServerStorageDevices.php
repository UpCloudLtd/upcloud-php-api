<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerStorageDevices
{
    /**
     * @var StorageDevice[]|null
     */
    private $storageDevice;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setStorageDevice($data['storage_device'] ?? null);
    }

    /**
     * @return StorageDevice[]|null
     */
    public function getStorageDevice(): ?array
    {
        return $this->storageDevice;
    }

    /**
     * @param StorageDevice[]|null $storageDevice
     * @return ServerStorageDevices
     */
    public function setStorageDevice(?array $storageDevice): ServerStorageDevices
    {
        if (is_array($storageDevice)) {
            foreach ($storageDevice as $item) {
                $this->storageDevice[] = $item instanceof StorageDevice ? $item : new StorageDevice($item);
            }
        } else {
            $this->storageDevice = $storageDevice;
        }

        return $this;
    }

}


