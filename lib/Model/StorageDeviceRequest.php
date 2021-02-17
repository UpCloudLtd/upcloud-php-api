<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class StorageDeviceRequest extends UpcloudApiRequest
{
    /**
     * @var StorageDevice|null
     */
    private $storageDevice;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->storageDevice =  $data['storage_device'] ?? null;
    }

    /**
     * @return StorageDevice|null
     */
    public function getStorageDevice(): ?StorageDevice
    {
        return $this->storageDevice;
    }

    /**
     * @param StorageDevice|array|null $storageDevice
     * @return $this
     */
    public function setStorageDevice($storageDevice): self
    {
        if (is_array($storageDevice)) {
            $this->storageDevice = new StorageDevice($storageDevice);
        } else {
            $this->storageDevice = $storageDevice;
        }

        return $this;
    }
}
