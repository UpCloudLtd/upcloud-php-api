<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use InvalidArgumentException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\CreateNewTagResponse;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\ModifyTagRequest;
use Upcloud\ApiClient\Model\TagCreateRequest;
use Upcloud\ApiClient\Model\TagListResponse;

/**
 * TagApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class TagApi extends BaseApi
{

    /**
     * Operation assignTag
     *
     * Assign tag to a server
     *
     * @param string $serverId Server id (required)
     * @param string $tagList List of tags (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function assignTag(string $serverId, string $tagList): CreateServerResponse
    {
        list($response) = $this->assignTagWithHttpInfo($serverId, $tagList);
        return $response;
    }

    /**
     * Operation assignTagWithHttpInfo
     *
     * Assign tag to a server
     *
     * @param string $serverId Server id (required)
     * @param string $tagList List of tags (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function assignTagWithHttpInfo(string $serverId, string $tagList): array
    {
        $url = $this->buildPath('server/{serverId}/tag/{tagList}', compact('serverId', 'tagList'));
        $request =  new Request('POST', $url);

        $response = $this->client->send($request);

        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation assignTagAsync
     *
     * Assign tag to a server
     *
     * @param string $serverId Server id (required)
     * @param string $tagList List of tags (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function assignTagAsync(string $serverId, string $tagList): PromiseInterface
    {
        return $this->assignTagAsyncWithHttpInfo($serverId, $tagList)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation assignTagAsyncWithHttpInfo
     *
     * Assign tag to a server
     *
     * @param string $serverId Server id (required)
     * @param string $tagList List of tags (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function assignTagAsyncWithHttpInfo(string $serverId, string $tagList): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/tag/{tagList}', compact('serverId', 'tagList'));

        $request =  new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {

            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation createTag
     *
     * Create a new tag
     *
     * @param TagCreateRequest $tag  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateNewTagResponse
     */
    public function createTag(TagCreateRequest $tag): CreateNewTagResponse
    {
        list($response) = $this->createTagWithHttpInfo($tag);
        return $response;
    }

    /**
     * Operation createTagWithHttpInfo
     *
     * Create a new tag
     *
     * @param TagCreateRequest $tag  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateNewTagResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTagWithHttpInfo(TagCreateRequest $tag): array
    {
        $request = new Request('POST', 'tag', [], $tag);
        $response = $this->client->send($request);

        return $response->toArray(CreateNewTagResponse::class);
    }

    /**
     * Operation createTagAsync
     *
     * Create a new tag
     *
     * @param TagCreateRequest $tag  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createTagAsync(TagCreateRequest $tag): PromiseInterface
    {
        return $this->createTagAsyncWithHttpInfo($tag)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createTagAsyncWithHttpInfo
     *
     * Create a new tag
     *
     * @param TagCreateRequest $tag  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createTagAsyncWithHttpInfo(TagCreateRequest $tag): PromiseInterface
    {
        $request = new Request('POST', 'tag', [], $tag);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateNewTagResponse::class);
        });
    }

    /**
     * Operation deleteTag
     *
     * Delete tag
     *
     * @param string $tagName Tag name (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteTag(string $tagName): void
    {
        $this->deleteTagWithHttpInfo($tagName);
    }

    /**
     * Operation deleteTagWithHttpInfo
     *
     * Delete tag
     *
     * @param string $tagName Tag name (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTagWithHttpInfo(string $tagName): array
    {
        $url = $this->buildPath('tag/{tagName}', compact('tagName'));
        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);
        return  $response->toArray();
    }

    /**
     * Operation deleteTagAsync
     *
     * Delete tag
     *
     * @param string $tagName Tag name (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteTagAsync(string $tagName): PromiseInterface
    {
        return $this->deleteTagAsyncWithHttpInfo($tagName)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteTagAsyncWithHttpInfo
     *
     * Delete tag
     *
     * @param string $tagName Tag name (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteTagAsyncWithHttpInfo(string $tagName): PromiseInterface
    {
        $url = $this->buildPath('tag/{tagName}', compact('tagName'));
        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation listTags
     *
     * List existing tags
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return TagListResponse
     */
    public function listTags(): TagListResponse
    {
        list($response) = $this->listTagsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listTagsWithHttpInfo
     *
     * List existing tags
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of TagListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTagsWithHttpInfo(): array
    {
        $request = new Request('GET', 'tag');

        $response = $this->client->send($request);
        return $response->toArray(TagListResponse::class);
    }

    /**
     * Operation listTagsAsync
     *
     * List existing tags
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listTagsAsync(): PromiseInterface
    {
        return $this->listTagsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listTagsAsyncWithHttpInfo
     *
     * List existing tags
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listTagsAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'tag');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(TagListResponse::class);
        });
    }

    /**
     * Operation modifyTag
     *
     * Modify existing tag
     *
     * @param string $tagName Tag name (required)
     * @param ModifyTagRequest $tag  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateNewTagResponse
     */
    public function modifyTag(string $tagName, ModifyTagRequest $tag): CreateNewTagResponse
    {
        list($response) = $this->modifyTagWithHttpInfo($tagName, $tag);
        return $response;
    }

    /**
     * Operation modifyTagWithHttpInfo
     *
     * Modify existing tag
     *
     * @param string $tagName Tag name (required)
     * @param ModifyTagRequest $tag  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateNewTagResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyTagWithHttpInfo(string $tagName, ModifyTagRequest $tag): array
    {
        $url = $this->buildPath('tag/{tagName}', compact('tagName'));
        $request = new Request('PUT', $url, [], $tag);

        $response = $this->client->send($request);

        return $response->toArray(CreateNewTagResponse::class);
    }

    /**
     * Operation modifyTagAsync
     *
     * Modify existing tag
     *
     * @param string $tagName Tag name (required)
     * @param ModifyTagRequest $tag  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyTagAsync(string $tagName, ModifyTagRequest $tag): PromiseInterface
    {
        return $this->modifyTagAsyncWithHttpInfo($tagName, $tag)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyTagAsyncWithHttpInfo
     *
     * Modify existing tag
     *
     * @param string $tagName Tag name (required)
     * @param ModifyTagRequest $tag  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyTagAsyncWithHttpInfo(string $tagName, ModifyTagRequest $tag): PromiseInterface
    {
        $url = $this->buildPath('tag/{tagName}', compact('tagName'));
        $request = new Request('PUT', $url, [], $tag);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateNewTagResponse::class);
        });
    }

    /**
     * Operation untag
     *
     * Remove tag from server
     *
     * @param string $serverId Server id (required)
     * @param string $tagName Tag name (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function untag(string $serverId, string $tagName): CreateServerResponse
    {
        list($response) = $this->untagWithHttpInfo($serverId, $tagName);
        return $response;
    }

    /**
     * Operation untagWithHttpInfo
     *
     * Remove tag from server
     *
     * @param string $serverId Server id (required)
     * @param string $tagName Tag name (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function untagWithHttpInfo(string $serverId, string $tagName): array
    {
        $url = $this->buildPath('server/{serverId}/untag/{tagName}', compact('serverId', 'tagName'));

        $request = new Request('POST', $url);
        $response = $this->client->send($request);

        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation untagAsync
     *
     * Remove tag from server
     *
     * @param string $serverId Server id (required)
     * @param string $tagName Tag name (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function untagAsync(string $serverId, string $tagName): PromiseInterface
    {
        return $this->untagAsyncWithHttpInfo($serverId, $tagName)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation untagAsyncWithHttpInfo
     *
     * Remove tag from server
     *
     * @param string $serverId Server id (required)
     * @param string $tagName Tag name (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function untagAsyncWithHttpInfo(string $serverId, string $tagName): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/untag/{tagName}', compact('serverId', 'tagName'));
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }
}
