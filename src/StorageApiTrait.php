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

    /** TODO: add rest of operations */
}
