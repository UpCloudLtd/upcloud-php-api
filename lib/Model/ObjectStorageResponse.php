<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ObjectStorageResponse
{
    /**
     * @var ObjectStorage|null
     */
    private $objectStorage;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setObjectStorage($data['object_storage'] ?? null);
    }

    /**
     * @return ObjectStorage|null
     */
    public function getObjectStorage(): ?ObjectStorage
    {
        return $this->objectStorage;
    }

    /**
     * @param ObjectStorage|array|null $objectStorage
     * @return ObjectStorageResponse
     */
    public function setObjectStorage($objectStorage): ObjectStorageResponse
    {
        if (is_array($objectStorage)) {
            $this->objectStorage =new ObjectStorage($objectStorage);
        } else {
            $this->objectStorage = $objectStorage;
        }

        return $this;
    }

}
