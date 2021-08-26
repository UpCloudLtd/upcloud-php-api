<?php

namespace UpCloud;

/**
 * Trait for all Storage related API methods.
 */
trait StorageApiTrait
{
    public function getStorages()
    {
        $response = $this->httpClient->get('storage');
        return $response->storages->storage;
    }

    public function getStorage(string $uuid)
    {
        $response = $this->httpClient->get("storage/$uuid");
        return $response->storage;
    }

    public function getPublicTemplates()
    {
        $response = $this->httpClient->get("storage/public");
        return $response->storages->storage;
    }

    /**
     * Get storages of a certain type.
     *
     * @param 'public'|'private'|'normal'|'backup'|'cdrom'|'template'|'favorite $type Type of storages
     */
    public function getStoragesByType(string $type)
    {
        $response = $this->httpClient->get("storage/$type");
        return $response->storage;
    }
}
