<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class ObjectStorageRequest extends UpcloudApiRequest
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
        parent::__construct();
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
     * @return $this
     */
    public function setObjectStorage($objectStorage): self
    {
        if (is_array($objectStorage)) {
            $this->objectStorage = new ObjectStorage($objectStorage);
        } else {
            $this->objectStorage = $objectStorage;
        }

        return $this;
    }
}
