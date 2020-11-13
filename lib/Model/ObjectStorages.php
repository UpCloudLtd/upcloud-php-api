<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ObjectStorages
{
    /**
     * @var ObjectStorage[]|null
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
     * @return ObjectStorage[]|null
     */
    public function getObjectStorage(): ?array
    {
        return $this->objectStorage;
    }

    /**
     * @param ObjectStorage[]|array|null $objectStorage
     * @return ObjectStorages
     */
    public function setObjectStorage(?array $objectStorage): ObjectStorages
    {
        if (is_array($objectStorage)) {
            foreach ($objectStorage as $item) {
                $this->objectStorage[] = new ObjectStorage($item);
            }
        } else {
            $this->objectStorage = $objectStorage;
        }

        return $this;
    }
}
