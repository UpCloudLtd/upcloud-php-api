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
        return $response->storages->storage;
    }

    /**
     * Create a storage.
     *
     * @param $storage The storage object to create
     * @return object created storage
     */
    public function createStorage($storage)
    {
        $response = $this->httpClient->post("storage", ['storage' => $storage]);
        return $response->storage;
    }

    /**
     * Delete a storage and optionally also its backups.
     *
     * @param string $uuid UUID of the storage to delete
     * @param array{backups?: 'keep'|'keep_latest'|'delete'} $opts Optional settings to backups along with the storage
     * @return mixed HTTP response object status 204 with no content
     */
    public function deleteStorage(string $storageUuid, $opts = null)
    {
        $path = "storags/$storageUuid" . (empty($opts) ? '' : '?' . http_build_query($opts));
        return $this->httpClient->delete($path);
    }
}
