<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class SuccessStoragesResponseStorages
{
    /**
     * @var Storage[]|null
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
     * @return Storage[]|null
     */
    public function getStorage(): ?array
    {
        return $this->storage;
    }

    /**
     * @param Storage[]|array|null $storage
     * @return SuccessStoragesResponseStorages
     */
    public function setStorage(?array $storage): SuccessStoragesResponseStorages
    {
        if (is_array($storage)) {
            foreach ($storage as $item) {
                $this->storage[] = $item instanceof Storage ? $item : new Storage($item);
            }
        } else {
            $this->storage = $storage;
        }

        return $this;
    }
}


