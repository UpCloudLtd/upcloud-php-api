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

    /**
     * Create an import task to import data into an existing storage from a public URL.
     * If the storage is attached to a server, the server must be in `stopped` state.
     *
     * @param string $storageUuid UUID of the storage to import data into.
     * @param string $url         A valid URL to the data to import.
     *
     * @return object A status object for the import task.
     *
     * @link https://developers.upcloud.com/1.3/9-storages/#create-import
     */
    public function createStorageImportFromUrl(string $storageUuid, string $url)
    {
        $response = $this->httpClient->post(
            "storage/$storageUuid/import",
            ['storage_import' => [
                'source' => 'http_import',
                'source_location' => $url,
            ]]
        );
        return $response->storage_import;
    }

    /**
     * Create an import task to import data into an existing storage from a local
     * file. If the storage is attached to a server, the server must be in
     * `stopped` state.
     *
     * You must start the upload separate with uploadStorageImport() method.
     *
     * @param string $storageUuid UUID of the storage to import data into.
     * @param file
     *
     * @return object A status object for the import task.
     *
     * @link https://developers.upcloud.com/1.3/9-storages/#create-import
     *
     * @see uploadToStorageImport Upload a file to the storage import task.
     */
    public function createStorageImportUpload(string $storageUuid)
    {
        $response = $this->httpClient->post(
            "storage/$storageUuid/import",
            ['storage_import' => ['source' => 'direct_upload']]
        );
        return $response->storage_import;
    }

    /**
     * Upload a file to a "direct upload" storage import task. This will import
     * the data from the file into the storage.
     *
     * @param string          $url  The URL for the direct upload.
     * @param string|resource $file Path to a file, or a file resource.
     *
     * @return object Hash sums of the uploaded image, and amount of written bytes.
     *
     * @see createStorageImportUpload Create a storage import task.
     *
     * @todo async
     */
    public function uploadToStorageImport(string $url, $file)
    {
        if (is_string($file)) {
            $body = fopen($file, 'r');
        } else {
            $body = $file;
        }

        $response = $this->httpClient->request('PUT', $url, ['body' => $body]);
        $decodedBody = json_decode($response->getBody());
        return $decodedBody;
    }

    /**
     * Get details of a finished or ongoing import task of a given storage.
     *
     * @param string $storageUuid UUID of the storage.
     *
     * @return object Details of the storage import (if found).
     */
    public function getStorageImportDetails(string $storageUuid)
    {
        $response = $this->httpClient->get("storage/$storageUuid/import");
        return $response->storage_import;
    }

    /**
     * Cancel an ongoing import task of a given storage. The storage data will
     * be rolled back to the state before starting the import task.
     *
     * @param string $storageUuid UUID of the storage.
     */
    public function cancelStorageImport(string $storageUuid)
    {
        $response = $this->httpClient->post("storage/$storageUuid/import/cancel", null);
        return $response->storage_import;
    }
}
