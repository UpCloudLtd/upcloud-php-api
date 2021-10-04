<?php

namespace UpCloud;

/**
 * Trait for all Storage related API methods.
 */
trait StorageApiTrait
{
    /**
     * @var \UpCloud\HttpClient
     */
    protected $httpClient;

    /**
     * Get all available storages.
     * @return array<object> Array of storages
     */
    public function getStorages()
    {
        $response = $this->httpClient->get('storage');
        return $response->storages->storage;
    }

    /**
     * Get details of a storage.
     *
     * @param string $uuid UUID of the storage.
     */
    public function getStorage(string $uuid)
    {
        $response = $this->httpClient->get("storage/$uuid");
        return $response->storage;
    }

    /**
     * Get the public template storages like Debian and Ubuntu.
     * @return array<object> Array of storages
     */
    public function getPublicTemplates()
    {
        $response = $this->httpClient->get("storage/public");
        return $response->storages->storage;
    }

    /**
     * Get storages of a certain type.
     *
     * @param 'public'|'private'|'normal'|'backup'|'cdrom'|'template'|'favorite' $type Type of storages
     */
    public function getStoragesByType(string $type)
    {
        $response = $this->httpClient->get("storage/$type");
        return $response->storages->storage;
    }

    /**
     * Create a storage.
     *
     * @param array $storage The storage object to create
     * @return object created storage
     */
    public function createStorage(array $storage)
    {
        $response = $this->httpClient->post("storage", ['storage' => $storage]);
        return $response->storage;
    }

    /**
     * Delete a storage and optionally also its backups.
     *
     * Options:
     *
     * - backups: ('keep'|'keep_latest'|'delete') Delete or keep backups of the storage (default: 'keep').
     *
     * @param string $uuid UUID of the storage to delete
     * @param array{backups?: 'keep'|'keep_latest'|'delete'} $opts Options
     * @return mixed HTTP response object status 204 with no content
     */
    public function deleteStorage(string $storageUuid, array $opts = null)
    {
        $path = "storags/$storageUuid" . (empty($opts) ? '' : '?' . http_build_query($opts));
        return $this->httpClient->delete($path);
    }

    /**
     * Modify a storage.
     *
     * @param string $storageUuid UUID of the storage to modify
     * @param array $storage The storage details
     */
    public function modifyStorage(string $storageUuid, array $storage)
    {
        $path = "storages/$storageUuid";
        $response = $this->httpClient->put($path, ['storage' => $storage]);
        return $response->storage;
    }
}
