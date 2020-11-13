<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ObjectStorageListResponse
{
    /**
     * @var ObjectStorages|null
     */
    private $objectStorages;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setObjectStorages($data['object_storages'] ?? null);
    }

    /**
     * @return ObjectStorages|null
     */
    public function getObjectStorages(): ?ObjectStorages
    {
        return $this->objectStorages;
    }

    /**
     * @param ObjectStorages|array|null $objectStorages
     * @return ObjectStorageListResponse
     */
    public function setObjectStorages($objectStorages): ObjectStorageListResponse
    {
        if (is_array($objectStorages)) {
            $this->objectStorages = new ObjectStorages($objectStorages);
        } else {
            $this->objectStorages = $objectStorages;
        }

        return $this;
    }
}
