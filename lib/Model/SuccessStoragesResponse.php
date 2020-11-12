<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class SuccessStoragesResponse
{
    /**
     * @var SuccessStoragesResponseStorages|null
     */
    private $storages;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setStorages($data['storages'] ?? null);
    }

    /**
     * @return SuccessStoragesResponseStorages|null
     */
    public function getStorages(): ?SuccessStoragesResponseStorages
    {
        return $this->storages;
    }

    /**
     * @param SuccessStoragesResponseStorages|array|null $storages
     * @return SuccessStoragesResponse
     */
    public function setStorages($storages): SuccessStoragesResponse
    {
        if (is_array($storages)) {
            $this->storages = new SuccessStoragesResponseStorages($storages);
        } else {
            $this->storages = $storages;
        }

        return $this;
    }
}


