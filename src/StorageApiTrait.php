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
     *
     * @param string $type (optional) Type of storages to get.
     *                     Possible types:
     *                     "public"|"private"|"normal"|"backup"|"cdrom"|"template"|"favorite"
     *
     * @return array Array of storages
     */
    public function getStorages(string $type = null)
    {
        $response = $this->httpClient->get(isset($type) ? "storage/$type" : 'storage');
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
     * Get the public template storages like Debian and Ubuntu. Alias of getStorages() with $type set to "public".
     *
     * @return array<object> Array of storages
     *
     * @see getStorages
     */
    public function getPublicTemplates()
    {
        return $this->getStorages("public");
    }

    /**
     * Get storages of a certain type. Alias of getStorages() with some sugar.
     *
     * @param string $type Type of storages to get. Possible types:
     *                     "public"|"private"|"normal"|"backup"|"cdrom"|"template"|"favorite"
     *
     * @return array<object> Array of storages
     *
     * @see getStorages
     */
    public function getStoragesByType(string $type)
    {
        return $this->getStorages($type);
    }

    /**
     * Create a storage.
     *
     * @param array $storage Details of the object to create. See
     *                       https://developers.upcloud.com/1.3/9-storages/#create-storage
     *                       for the most up-to-date on available fields
     *
     * @return object The created storage
     *
     * @link https://developers.upcloud.com/1.3/9-storages/#create-storage
     */
    public function createStorage(array $storage)
    {
        $response = $this->httpClient->post('storage', ['storage' => $storage]);
        return $response->storage;
    }

    /**
     * Delete a storage and optionally also its backups.
     *
     * The options array accepts the following options:
     *
     * - backups: ('keep'|'keep_latest'|'delete') Controls what to do to the backups of the storage. (default: 'keep')
     *
     * @param string $uuid    UUID of the storage to delete
     * @param array  $options (optional) Options for the deletion, such as strategy for the backups.
     *
     * @return mixed HTTP response object status 204 with no content
     */
    public function deleteStorage(string $storageUuid, array $opts = null)
    {
        $path = "storage/$storageUuid" . (empty($opts) ? '' : '?' . http_build_query($opts));
        return $this->httpClient->delete($path);
    }

    /**
     * Modify a storage.
     *
     * @param string $storageUuid UUID of the storage to modify
     * @param array  $storage     The changes to the storage details. See
     *                            https://developers.upcloud.com/1.3/9-storages/#modify-storage
     *                            for up-to-date documentation.
     *
     * @return object The modified storage
     *
     * @link https://developers.upcloud.com/1.3/9-storages/#modify-storage
     */
    public function modifyStorage(string $storageUuid, array $storage)
    {
        $path = "storage/$storageUuid";
        $response = $this->httpClient->put($path, ['storage' => $storage]);
        return $response->storage;
    }
}
