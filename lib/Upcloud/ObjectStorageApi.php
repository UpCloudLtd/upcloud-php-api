<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use GuzzleHttp\Exception\GuzzleException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\CreateObjectStorageRequest;
use Upcloud\ApiClient\Model\ModifyObjectStorageRequest;
use Upcloud\ApiClient\Model\ObjectStorageListResponse;
use Upcloud\ApiClient\Model\ObjectStorageResponse;

/**
 * ObjectStorageApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class ObjectStorageApi extends BaseApi
{
    /**
     * Operation getListObjectStorage
     *
     * List all Object Storage
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException | GuzzleException
     * @return ObjectStorageListResponse
     */
    public function getListObjectStorage(): ObjectStorageListResponse
    {
        list($response) = $this->getListObjectStorageWithHttpInfo();
        return $response;
    }

    /**
     * Operation getListObjectStorageWithHttpInfo
     *
     * List all Object Storage
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException | GuzzleException
     * @return array of ObjectStorageListResponse,
     *                  HTTP status code,
     *                  HTTP response headers (array of strings)
     */
    public function getListObjectStorageWithHttpInfo(): array
    {
        $request = new Request('GET', 'object-storage');
        $response = $this->client->send($request);

        return $response->toArray(ObjectStorageListResponse::class);
    }


    /**
     * Operation getListObjectStorageAsync
     *
     * List all Object Storage
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListObjectStorageAsync(): PromiseInterface
    {
        return $this->getListObjectStorageAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getListObjectStorageAsyncWithHttpInfo
     *
     * List all Object Storage
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListObjectStorageAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'object-storage');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ObjectStorageListResponse::class);
        });
    }

    /**
     * Operation getObjectStorageDetails
     *
     * Get details about a specific Object Storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ObjectStorageResponse
     */
    public function getObjectStorageDetails(string $uuid): ObjectStorageResponse
    {
        list($response) = $this->getObjectStorageDetailsWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation getObjectStorageDetailsWithHttpInfo
     *
     * Get details about a specific Object Storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of ObjectStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getObjectStorageDetailsWithHttpInfo(string $uuid): array
    {

        $url = $this->buildPath('object-storage/{uuid}', compact('uuid'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(ObjectStorageResponse::class);
    }

    /**
     * Operation getObjectStorageDetailsAsync
     *
     * Get details about a specific Object Storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getObjectStorageDetailsAsync(string $uuid): PromiseInterface
    {
        return $this->getObjectStorageDetailsAsyncWithHttpInfo($uuid)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getObjectStorageDetailsAsyncWithHttpInfo
     *
     * Get details about a specific Object Storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getObjectStorageDetailsAsyncWithHttpInfo(string $uuid): PromiseInterface
    {
        $url = $this->buildPath('object-storage/{uuid}', compact('uuid'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ObjectStorageResponse::class);
        });
    }

    /**
     * Operation createObjectStorage
     *
     * Create a new object storage
     *
     * @param CreateObjectStorageRequest $storage (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ObjectStorageResponse
     */
    public function createObjectStorage(CreateObjectStorageRequest $storage): ObjectStorageResponse
    {
        list($response) = $this->createObjectStorageWithHttpInfo($storage);
        return $response;
    }

    /**
     * Operation createObjectStorageWithHttpInfo
     *
     * Create a new object storage
     *
     * @param CreateObjectStorageRequest $storage (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of ObjectStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createObjectStorageWithHttpInfo(CreateObjectStorageRequest $storage): array
    {
        $request = new Request('POST', 'object-storage', [], $storage);
        $response = $this->client->send($request);

        return $response->toArray(ObjectStorageResponse::class);
    }

    /**
     * Operation createObjectStorageAsync
     *
     * Create a new object storage
     *
     * @param CreateObjectStorageRequest $storage (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createObjectStorageAsync(CreateObjectStorageRequest $storage): PromiseInterface
    {
        return $this->createObjectStorageAsyncWithHttpInfo($storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createObjectStorageAsyncWithHttpInfo
     *
     * Create a new object storage
     *
     * @param CreateObjectStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createObjectStorageAsyncWithHttpInfo(CreateObjectStorageRequest $storage): PromiseInterface
    {
        $request = new Request('POST', 'object-storage', [], $storage);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ObjectStorageResponse::class);
        });
    }


    /**
     * Operation modifyObjectStorage
     *
     * Modify specific object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @param ModifyObjectStorageRequest $storage  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ObjectStorageResponse
     */
    public function modifyObjectStorage(string $uuid, ModifyObjectStorageRequest $storage): ObjectStorageResponse
    {
        list($response) = $this->modifyObjectStorageWithHttpInfo($uuid, $storage);
        return $response;
    }

    /**
     * Operation modifyObjectStorageWithHttpInfo
     *
     * Modify specific object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @param ModifyObjectStorageRequest $storage  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of  ObjectStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyObjectStorageWithHttpInfo(string $uuid, ModifyObjectStorageRequest $storage): array
    {
        $url = $this->buildPath('object-storage/{uuid}', compact('uuid'));

        $request = new Request('PATCH', $url, [], $storage);

        $response = $this->client->send($request);
        return $response->toArray(ObjectStorageResponse::class);
    }

    /**
     * Operation modifyObjectStorageAsync
     *
     * Modify specific object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @param ModifyObjectStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyObjectStorageAsync(string $uuid, ModifyObjectStorageRequest $storage): PromiseInterface
    {
        return $this->modifyObjectStorageAsyncWithHttpInfo($uuid, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyObjectStorageAsyncWithHttpInfo
     *
     * Modify specific object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @param ModifyObjectStorageRequest $storage  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyObjectStorageAsyncWithHttpInfo(
        string $uuid,
        ModifyObjectStorageRequest $storage
    ): PromiseInterface {
        $url = $this->buildPath('object-storage/{uuid}', compact('uuid'));

        $request = new Request('PATCH', $url, [], $storage);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ObjectStorageResponse::class);
        });
    }

    /**
     * Operation deleteObjectStorage
     *
     * Release object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteObjectStorage(string $uuid): void
    {
        $this->deleteObjectStorageWithHttpInfo($uuid);
    }

    /**
     * Operation deleteObjectStorageWithHttpInfo
     *
     * Release object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteObjectStorageWithHttpInfo(string $uuid): array
    {
        $url = $this->buildPath('object-storage/{uuid}', compact('uuid'));
        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteObjectStorageAsync
     *
     * Release object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteObjectStorageAsync(string $uuid): PromiseInterface
    {
        return $this->deleteObjectStorageAsyncWithHttpInfo($uuid)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteObjectStorageAsyncWithHttpInfo
     *
     * Release object storage
     *
     * @param string $uuid ObjectStorage uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteObjectStorageAsyncWithHttpInfo(string $uuid): PromiseInterface
    {
        $url = $this->buildPath('object-storage/{uuid}', compact('uuid'));
        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }
}
