<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class CreateStorageResponse
{
    /**
     * @var Storage|null
     */
    private $storage;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setStorage($data['storage'] ?? null);
    }

    /**
     * @return Storage|null
     */
    public function getStorage(): ?Storage
    {
        return $this->storage;
    }

    /**
     * @param Storage|array|null $storage
     * @return CreateStorageResponse
     */
    public function setStorage($storage): CreateStorageResponse
    {
        if (is_array($storage)) {
            $this->storage = new Storage($storage);
        } else {
            $this->storage = $storage;
        }

        return $this;
    }
}


