<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\AttachStorageDeviceRequest;
use Upcloud\ApiClient\Model\CloneStorageRequest;
use Upcloud\ApiClient\Model\CreateBackupStorageRequest;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\CreateStorageRequest;
use Upcloud\ApiClient\Model\CreateStorageResponse;
use Upcloud\ApiClient\Model\ModifyStorageRequest;
use Upcloud\ApiClient\Model\StorageDeviceDetachRequest;
use Upcloud\ApiClient\Model\StorageDeviceLoadRequest;
use Upcloud\ApiClient\Model\SuccessStoragesResponse;
use Upcloud\ApiClient\Model\TemplitizeStorageRequest;
use Webmozart\Assert\Assert;

/**
 * StorageApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class StorageApi extends BaseApi
{
    const CDROM = 'cdrom';
    const TEMPLATE = 'template';
    const BACKUP = 'backup';
    const NORMAL = 'normal';
    const PUBLIC = 'public';
    const PRIVATE = 'private';
    const FAVORITE = 'favorite';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableStorageType()
    {
        return [
            self::CDROM,
            self::TEMPLATE,
            self::BACKUP,
            self::NORMAL,
            self::PUBLIC,
            self::PRIVATE,
            self::FAVORITE
        ];
    }

    /**
     * Operation attachStorage
     *
     * Attach storage
     *
     * @param string $serverId Server id (required)
     * @param AttachStorageDeviceRequest $storageDevice  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function attachStorage(string $serverId, AttachStorageDeviceRequest $storageDevice): CreateServerResponse
    {
        list($response) = $this->attachStorageWithHttpInfo($serverId, $storageDevice);
        return $response;
    }

    /**
     * Operation attachStorageWithHttpInfo
     *
     * Attach storage
     *
     * @param string $serverId Server id (required)
     * @param AttachStorageDeviceRequest $storageDevice  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function attachStorageWithHttpInfo(string $serverId, AttachStorageDeviceRequest $storageDevice): array
    {
        $url = $this->buildPath('server/{serverId}/storage/attach', compact('serverId'));
        $request = new Request('POST', $url, [], $storageDevice);

        $response = $this->client->send($request);
        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation attachStorageAsync
     *
     * Attach storage
     *
     * @param string $serverId Server id (required)
     * @param AttachStorageDeviceRequest $storageDevice  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function attachStorageAsync(string $serverId, AttachStorageDeviceRequest $storageDevice): PromiseInterface
    {
        return $this->attachStorageAsyncWithHttpInfo($serverId, $storageDevice)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation attachStorageAsyncWithHttpInfo
     *
     * Attach storage
     *
     * @param string $serverId Server id (required)
     * @param AttachStorageDeviceRequest $storageDevice  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function attachStorageAsyncWithHttpInfo(
        string $serverId,
        AttachStorageDeviceRequest $storageDevice
    ): PromiseInterface {

        $url = $this->buildPath('server/{serverId}/storage/attach', compact('serverId'));
        $request = new Request('POST', $url, [], $storageDevice);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation backupStorage
     *
     * Create backup
     *
     * @param string $storageId Storage id (required)
     * @param CreateBackupStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateStorageResponse
     */
    public function backupStorage(string $storageId, CreateBackupStorageRequest $storage): CreateStorageResponse
    {
        list($response) = $this->backupStorageWithHttpInfo($storageId, $storage);
        return $response;
    }

    /**
     * Operation backupStorageWithHttpInfo
     *
     * Create backup
     *
     * @param string $storageId Storage id (required)
     * @param CreateBackupStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function backupStorageWithHttpInfo(string $storageId, CreateBackupStorageRequest $storage): array
    {

        $url = $this->buildPath('storage/{storageId}/backup', compact('storageId'));
        $request = new Request('POST', $url, [], $storage);

        $response = $this->client->send($request);

        return $response->toArray(CreateStorageResponse::class);
    }

    /**
     * Operation backupStorageAsync
     *
     * Create backup
     *
     * @param string $storageId Storage id (required)
     * @param CreateBackupStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function backupStorageAsync(string $storageId, CreateBackupStorageRequest $storage): PromiseInterface
    {
        return $this->backupStorageAsyncWithHttpInfo($storageId, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation backupStorageAsyncWithHttpInfo
     *
     * Create backup
     *
     * @param string $storageId Storage id (required)
     * @param CreateBackupStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function backupStorageAsyncWithHttpInfo(
        string $storageId,
        CreateBackupStorageRequest $storage
    ): PromiseInterface {

        $url = $this->buildPath('storage/{storageId}/backup', compact('storageId'));
        $request = new Request('POST', $url, [], $storage);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateStorageResponse::class);
        });
    }

    /**
     * Operation cancelOperation
     *
     * Cancel storage operation
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function cancelOperation(string $storageId): void
    {
        $this->cancelOperationWithHttpInfo($storageId);
    }

    /**
     * Operation cancelOperationWithHttpInfo
     *
     * Cancel storage operation
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelOperationWithHttpInfo(string $storageId): array
    {
        $url = $this->buildPath('storage/{storageId}/cancel', compact('storageId'));
        $request = new Request('POST', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation cancelOperationAsync
     *
     * Cancel storage operation
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function cancelOperationAsync(string $storageId): PromiseInterface
    {
        return $this->cancelOperationAsyncWithHttpInfo($storageId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation cancelOperationAsyncWithHttpInfo
     *
     * Cancel storage operation
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function cancelOperationAsyncWithHttpInfo(string $storageId): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}/cancel', compact('storageId'));
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation cloneStorage
     *
     * Clone storage
     *
     * @param string $storageId Storage id (required)
     * @param CloneStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateStorageResponse
     */
    public function cloneStorage(string $storageId, CloneStorageRequest $storage): CreateStorageResponse
    {
        list($response) = $this->cloneStorageWithHttpInfo($storageId, $storage);
        return $response;
    }

    /**
     * Operation cloneStorageWithHttpInfo
     *
     * Clone storage
     *
     * @param string $storageId Storage id (required)
     * @param CloneStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cloneStorageWithHttpInfo(string $storageId, CloneStorageRequest $storage): array
    {
        $url = $this->buildPath('storage/{storageId}/clone', compact('storageId'));
        $request = new Request('POST', $url, [], $storage);

        $response = $this->client->send($request);

        return $response->toArray(CreateStorageResponse::class);
    }

    /**
     * Operation cloneStorageAsync
     *
     * Clone storage
     *
     * @param string $storageId Storage id (required)
     * @param CloneStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function cloneStorageAsync(string $storageId, CloneStorageRequest $storage): PromiseInterface
    {
        return $this->cloneStorageAsyncWithHttpInfo($storageId, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation cloneStorageAsyncWithHttpInfo
     *
     * Clone storage
     *
     * @param string $storageId Storage id (required)
     * @param CloneStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function cloneStorageAsyncWithHttpInfo(string $storageId, CloneStorageRequest $storage): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}/clone', compact('storageId'));
        $request = new Request('POST', $url, [], $storage);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {

            return $response->toArray(CreateStorageResponse::class);
        });
    }

    /**
     * Operation createStorage
     *
     * Create storage
     *
     * @param CreateStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateStorageResponse
     */
    public function createStorage(CreateStorageRequest $storage): CreateStorageResponse
    {
        list($response) = $this->createStorageWithHttpInfo($storage);
        return $response;
    }

    /**
     * Operation createStorageWithHttpInfo
     *
     * Create storage
     *
     * @param CreateStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createStorageWithHttpInfo(CreateStorageRequest $storage): array
    {
        $request = new Request('POST', 'storage', [], $storage);
        $response = $this->client->send($request);

        return $response->toArray(CreateStorageResponse::class);
    }

    /**
     * Operation createStorageAsync
     *
     * Create storage
     *
     * @param CreateStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createStorageAsync(CreateStorageRequest $storage): PromiseInterface
    {
        return $this->createStorageAsyncWithHttpInfo($storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createStorageAsyncWithHttpInfo
     *
     * Create storage
     *
     * @param CreateStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createStorageAsyncWithHttpInfo(CreateStorageRequest $storage): PromiseInterface
    {
        $request = new Request('POST', 'storage', [], $storage);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateStorageResponse::class);
        });
    }

    /**
     * Operation deleteStorage
     *
     * Delete storage
     *
     * @param string $storageId  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteStorage(string $storageId): void
    {
        $this->deleteStorageWithHttpInfo($storageId);
    }

    /**
     * Operation deleteStorageWithHttpInfo
     *
     * Delete storage
     *
     * @param string $storageId  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteStorageWithHttpInfo(string $storageId): array
    {
        $url = $this->buildPath('storage/{storageId}', compact('storageId'));
        $request =  new Request('DELETE', $url);

        $response = $this->client->send($request);
        return $response->toArray();
    }

    /**
     * Operation deleteStorageAsync
     *
     * Delete storage
     *
     * @param string $storageId  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteStorageAsync(string $storageId): PromiseInterface
    {
        return $this->deleteStorageAsyncWithHttpInfo($storageId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteStorageAsyncWithHttpInfo
     *
     * Delete storage
     *
     * @param string $storageId  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteStorageAsyncWithHttpInfo(string $storageId): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}', compact('storageId'));
        $request =  new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation detachStorage
     *
     * Detach storage
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceDetachRequest $storageDevice  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function detachStorage(string $serverId, StorageDeviceDetachRequest $storageDevice): CreateServerResponse
    {
        list($response) = $this->detachStorageWithHttpInfo($serverId, $storageDevice);
        return $response;
    }

    /**
     * Operation detachStorageWithHttpInfo
     *
     * Detach storage
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceDetachRequest $storageDevice  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function detachStorageWithHttpInfo(string $serverId, StorageDeviceDetachRequest $storageDevice): array
    {
        $url = $this->buildPath('server/{serverId}/storage/detach', compact('serverId'));
        $request = new Request('POST', $url, [], $storageDevice);

        $response = $this->client->send($request);

        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation detachStorageAsync
     *
     * Detach storage
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceDetachRequest $storageDevice  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function detachStorageAsync(string $serverId, StorageDeviceDetachRequest $storageDevice): PromiseInterface
    {
        return $this->detachStorageAsyncWithHttpInfo($serverId, $storageDevice)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation detachStorageAsyncWithHttpInfo
     *
     * Detach storage
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceDetachRequest $storageDevice  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function detachStorageAsyncWithHttpInfo(
        string $serverId,
        StorageDeviceDetachRequest $storageDevice
    ): PromiseInterface {

        $url = $this->buildPath('server/{serverId}/storage/detach', compact('serverId'));
        $request = new Request('POST', $url, [], $storageDevice);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation ejectCdrom
     *
     * Eject CD-ROM
     *
     * @param string $serverId Server id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function ejectCdrom(string $serverId): CreateServerResponse
    {
        list($response) = $this->ejectCdromWithHttpInfo($serverId);
        return $response;
    }

    /**
     * Operation ejectCdromWithHttpInfo
     *
     * Eject CD-ROM
     *
     * @param string $serverId Server id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function ejectCdromWithHttpInfo(string $serverId): array
    {
        $url = $this->buildPath('server/{serverId}/cdrom/eject', compact('serverId'));
        $request = new Request('POST', $url);

        $response = $this->client->send($request);

        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation ejectCdromAsync
     *
     * Eject CD-ROM
     *
     * @param string $serverId Server id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function ejectCdromAsync(string $serverId): PromiseInterface
    {
        return $this->ejectCdromAsyncWithHttpInfo($serverId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation ejectCdromAsyncWithHttpInfo
     *
     * Eject CD-ROM
     *
     * @param string $serverId Server id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function ejectCdromAsyncWithHttpInfo(string $serverId): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/cdrom/eject', compact('serverId'));
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation favoriteStorage
     *
     * Add storage to favorites
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function favoriteStorage(string $storageId): void
    {
        $this->favoriteStorageWithHttpInfo($storageId);
    }

    /**
     * Operation favoriteStorageWithHttpInfo
     *
     * Add storage to favorites
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function favoriteStorageWithHttpInfo(string $storageId): array
    {
        $url = $this->buildPath('storage/{storageId}/favorite', compact('storageId'));
        $request = new Request('POST', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation favoriteStorageAsync
     *
     * Add storage to favorites
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function favoriteStorageAsync(string $storageId): PromiseInterface
    {
        return $this->favoriteStorageAsyncWithHttpInfo($storageId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation favoriteStorageAsyncWithHttpInfo
     *
     * Add storage to favorites
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function favoriteStorageAsyncWithHttpInfo(string $storageId): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}/favorite', compact('storageId'));
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation getStorageDetails
     *
     * Get storage details
     *
     * @param string $storageId  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateStorageResponse
     */
    public function getStorageDetails(string $storageId): CreateStorageResponse
    {
        list($response) = $this->getStorageDetailsWithHttpInfo($storageId);
        return $response;
    }

    /**
     * Operation getStorageDetailsWithHttpInfo
     *
     * Get storage details
     *
     * @param string $storageId  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStorageDetailsWithHttpInfo(string $storageId): array
    {
        $url = $this->buildPath('storage/{storageId}', compact('storageId'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(CreateStorageResponse::class);
    }

    /**
     * Operation getStorageDetailsAsync
     *
     * Get storage details
     *
     * @param string $storageId  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getStorageDetailsAsync(string $storageId): PromiseInterface
    {
        return $this->getStorageDetailsAsyncWithHttpInfo($storageId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getStorageDetailsAsyncWithHttpInfo
     *
     * Get storage details
     *
     * @param string $storageId  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getStorageDetailsAsyncWithHttpInfo(string $storageId): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}', compact('storageId'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateStorageResponse::class);
        });
    }

    /**
     * Operation listStorageTypes
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type
     *                      (&#x60;public&#x60; or &#x60;private&#x60;)
     *                      or  storage type
     *                      (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;)
     *                      or &#x60;favorite&#x60; status (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return SuccessStoragesResponse
     * @deprecated listStorageTypes will be removed. Use listStorages($type) instead.
     */
    public function listStorageTypes(string $type): SuccessStoragesResponse
    {
        return  $this->listStorages($type);
    }

    /**
     * Operation listStorageTypesWithHttpInfo
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type
     *                      (&#x60;public&#x60; or &#x60;private&#x60;)
     *                      or  storage type
     *                      (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;)
     *                      or &#x60;favorite&#x60; status (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of SuccessStoragesResponse, HTTP status code, HTTP response headers (array of strings)
     * @deprecated listStorageTypesWithHttpInfo will be removed. Use listStoragesWithHttpInfo($type) instead.
     */
    public function listStorageTypesWithHttpInfo(string $type): array
    {
        return $this->listStoragesWithHttpInfo($type);
    }

    /**
     * Operation listStorageTypesAsync
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type
     *                      (&#x60;public&#x60; or &#x60;private&#x60;)
     *                      or  storage type
     *                      (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;)
     *                      or &#x60;favorite&#x60; status (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     * @deprecated listStorageTypesAsync will be removed. Use listStoragesAsync($type) instead.
     */
    public function listStorageTypesAsync(string $type): PromiseInterface
    {
        return $this->listStoragesAsync($type);
    }

    /**
     * Operation listStorageTypesAsyncWithHttpInfo
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type
     *                      (&#x60;public&#x60; or &#x60;private&#x60;)
     *                      or  storage type
     *                      (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;)
     *                      or &#x60;favorite&#x60; status (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     * @deprecated listStorageTypesAsyncWithHttpInfo will be removed.
     *             Use listStoragesAsyncWithHttpInfo($type) instead.
     */
    public function listStorageTypesAsyncWithHttpInfo(string $type): PromiseInterface
    {
        return $this->listStoragesAsyncWithHttpInfo($type);
    }

    /**
     * Operation listStorages
     *
     * List of storages
     *
     * @param string|null $type
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return SuccessStoragesResponse
     */
    public function listStorages(?string $type = null): SuccessStoragesResponse
    {
        list($response) = $this->listStoragesWithHttpInfo($type);
        return $response;
    }

    /**
     * Operation listStoragesWithHttpInfo
     *
     * List of storages
     *
     * @param string|null $type
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of SuccessStoragesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listStoragesWithHttpInfo(?string $type = null): array
    {
        if ($type) {
            Assert::oneOf($type, self::getAllowableStorageType());
            $url = $this->buildPath('storage/{type}', compact('type'));
        } else {
            $url ='storage';
        }

        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(SuccessStoragesResponse::class);
    }

    /**
     * Operation listStoragesAsync
     *
     * List of storages
     *
     * @param string|null $type
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listStoragesAsync(?string $type = null): PromiseInterface
    {
        return $this->listStoragesAsyncWithHttpInfo($type)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listStoragesAsyncWithHttpInfo
     *
     * List of storages
     *
     * @param string|null $type
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listStoragesAsyncWithHttpInfo(?string $type = null): PromiseInterface
    {
        if ($type) {
            Assert::oneOf($type, self::getAllowableStorageType());
            $url = $this->buildPath('storage/{type}', compact('type'));
        } else {
            $url ='storage';
        }

        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(SuccessStoragesResponse::class);
        });
    }

    /**
     * Operation loadCdrom
     *
     * Load CD-ROM
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceLoadRequest|null $storageDevice  (optional)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function loadCdrom(string $serverId, ?StorageDeviceLoadRequest $storageDevice = null): CreateServerResponse
    {
        list($response) = $this->loadCdromWithHttpInfo($serverId, $storageDevice);
        return $response;
    }

    /**
     * Operation loadCdromWithHttpInfo
     *
     * Load CD-ROM
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceLoadRequest|null $storageDevice  (optional)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function loadCdromWithHttpInfo(string $serverId, ?StorageDeviceLoadRequest $storageDevice = null): array
    {
        $url = $this->buildPath('server/{serverId}/cdrom/load', compact('serverId'));
        $request =  new Request('POST', $url, [], $storageDevice);

        $response = $this->client->send($request);

        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation loadCdromAsync
     *
     * Load CD-ROM
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceLoadRequest|null $storageDevice  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function loadCdromAsync(string $serverId, ?StorageDeviceLoadRequest $storageDevice = null): PromiseInterface
    {
        return $this->loadCdromAsyncWithHttpInfo($serverId, $storageDevice)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation loadCdromAsyncWithHttpInfo
     *
     * Load CD-ROM
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceLoadRequest|null $storageDevice  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function loadCdromAsyncWithHttpInfo(
        string $serverId,
        ?StorageDeviceLoadRequest $storageDevice = null
    ): PromiseInterface {

        $url = $this->buildPath('server/{serverId}/cdrom/load', compact('serverId'));
        $request =  new Request('POST', $url, [], $storageDevice);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation modifyStorage
     *
     * Modify storage
     *
     * @param string $storageId  (required)
     * @param ModifyStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateStorageResponse
     */
    public function modifyStorage(string $storageId, ModifyStorageRequest $storage): CreateStorageResponse
    {
        list($response) = $this->modifyStorageWithHttpInfo($storageId, $storage);
        return $response;
    }

    /**
     * Operation modifyStorageWithHttpInfo
     *
     * Modify storage
     *
     * @param string $storageId  (required)
     * @param ModifyStorageRequest $storage  (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyStorageWithHttpInfo(string $storageId, ModifyStorageRequest $storage): array
    {
        $url = $this->buildPath('storage/{storageId}', compact('storageId'));
        $request = new Request('PUT', $url, [], $storage);

        $response = $this->client->send($request);

        return $response->toArray(CreateStorageResponse::class);
    }

    /**
     * Operation modifyStorageAsync
     *
     * Modify storage
     *
     * @param string $storageId  (required)
     * @param ModifyStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyStorageAsync(string $storageId, ModifyStorageRequest $storage): PromiseInterface
    {
        return $this->modifyStorageAsyncWithHttpInfo($storageId, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyStorageAsyncWithHttpInfo
     *
     * Modify storage
     *
     * @param string $storageId  (required)
     * @param ModifyStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyStorageAsyncWithHttpInfo(string $storageId, ModifyStorageRequest $storage): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}', compact('storageId'));
        $request = new Request('PUT', $url, [], $storage);

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(CreateStorageResponse::class);
        });
    }

    /**
     * Operation restoreStorage
     *
     * Restore backup
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function restoreStorage(string $storageId): void
    {
        $this->restoreStorageWithHttpInfo($storageId);
    }

    /**
     * Operation restoreStorageWithHttpInfo
     *
     * Restore backup
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function restoreStorageWithHttpInfo(string $storageId): array
    {
        $url = $this->buildPath('storage/{storageId}/restore', compact('storageId'));
        $request = new Request('POST', $url);
        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation restoreStorageAsync
     *
     * Restore backup
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function restoreStorageAsync(string $storageId): PromiseInterface
    {
        return $this->restoreStorageAsyncWithHttpInfo($storageId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation restoreStorageAsyncWithHttpInfo
     *
     * Restore backup
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function restoreStorageAsyncWithHttpInfo(string $storageId): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}/restore', compact('storageId'));
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }


    /**
     * Operation templatizeStorage
     *
     * Templatize storage
     *
     * @param string $storageId Storage id (required)
     * @param TemplitizeStorageRequest|null $storage  (optional)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateStorageResponse
     */
    public function templatizeStorage(
        string $storageId,
        ?TemplitizeStorageRequest $storage = null
    ): CreateStorageResponse {
        list($response) = $this->templatizeStorageWithHttpInfo($storageId, $storage);
        return $response;
    }

    /**
     * Operation templatizeStorageWithHttpInfo
     *
     * Templatize storage
     *
     * @param string $storageId Storage id (required)
     * @param TemplitizeStorageRequest|null $storage  (optional)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function templatizeStorageWithHttpInfo(string $storageId, ?TemplitizeStorageRequest $storage = null): array
    {
        $url = $this->buildPath('storage/{storageId}/templatize', compact('storageId'));
        $request = new Request('POST', $url, [], $storage);

        $response = $this->client->send($request);

        return $response->toArray(CreateStorageResponse::class);
    }

    /**
     * Operation templatizeStorageAsync
     *
     * Templatize storage
     *
     * @param string $storageId Storage id (required)
     * @param TemplitizeStorageRequest|null $storage  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function templatizeStorageAsync(
        string $storageId,
        ?TemplitizeStorageRequest $storage = null
    ): PromiseInterface {
        return $this->templatizeStorageAsyncWithHttpInfo($storageId, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation templatizeStorageAsyncWithHttpInfo
     *
     * Templatize storage
     *
     * @param string $storageId Storage id (required)
     * @param TemplitizeStorageRequest|null $storage  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function templatizeStorageAsyncWithHttpInfo(
        string $storageId,
        ?TemplitizeStorageRequest $storage = null
    ): PromiseInterface {
        $url = $this->buildPath('storage/{storageId}/templatize', compact('storageId'));
        $request = new Request('POST', $url, [], $storage);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateStorageResponse::class);
        });
    }

    /**
     * Operation unfavoriteStorage
     *
     * Remove storage from favorites
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function unfavoriteStorage(string $storageId): void
    {
        $this->unfavoriteStorageWithHttpInfo($storageId);
    }

    /**
     * Operation unfavoriteStorageWithHttpInfo
     *
     * Remove storage from favorites
     *
     * @param string $storageId Storage id (required)
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function unfavoriteStorageWithHttpInfo(string $storageId): array
    {
        $url = $this->buildPath('storage/{storageId}/favorite', compact('storageId'));
        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation unfavoriteStorageAsync
     *
     * Remove storage from favorites
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function unfavoriteStorageAsync(string $storageId): PromiseInterface
    {
        return $this->unfavoriteStorageAsyncWithHttpInfo($storageId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation unfavoriteStorageAsyncWithHttpInfo
     *
     * Remove storage from favorites
     *
     * @param string $storageId Storage id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function unfavoriteStorageAsyncWithHttpInfo(string $storageId): PromiseInterface
    {
        $url = $this->buildPath('storage/{storageId}/favorite', compact('storageId'));
        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }
}
