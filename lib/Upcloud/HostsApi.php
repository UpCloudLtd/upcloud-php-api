<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use InvalidArgumentException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\HostListResponse;
use Upcloud\ApiClient\Model\HostResponse;
use Upcloud\ApiClient\Model\ModifyHostRequest;

/**
 * HostsApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class HostsApi extends BaseApi
{
    /**
     * Operation getListHosts
     *
     * List of available hosts
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException | GuzzleException
     * @return HostListResponse
     */
    public function getListHosts(): HostListResponse
    {
        list($response) = $this->getListHostsWithHttpInfo();
        return $response;
    }

    /**
     * Operation getListHostsWithHttpInfo
     *
     * List of available hosts
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException | GuzzleException
     * @return array of HostListResponse,
     *                  HTTP status code,
     *                  HTTP response headers (array of strings)
     */
    public function getListHostsWithHttpInfo(): array
    {
        $request = new Request('GET', 'host');
        $response = $this->client->send($request);

        return $response->toArray(HostListResponse::class);
    }


    /**
     * Operation getListHostsAsync
     *
     * List of available hosts
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListHostsAsync(): PromiseInterface
    {
        return $this->getListHostsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getListHostsAsyncWithHttpInfo
     *
     * List of available hosts
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListHostsAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'host');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(HostListResponse::class);
        });
    }

    /**
     * Operation getHostDetails
     *
     * Get detailed information about a specific host
     *
     * @param int|string $id Host Id (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return HostResponse
     */
    public function getHostDetails($id): HostResponse
    {
        list($response) = $this->getHostDetailsWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation getHostDetailsWithHttpInfo
     *
     * Get detailed information about a specific host
     *
     * @param int|string $id Host Id (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of HostResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getHostDetailsWithHttpInfo($id): array
    {

        $url = $this->buildPath('host/{id}', compact('id'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(HostResponse::class);
    }

    /**
     * Operation getHostDetailsAsync
     *
     * Get detailed information about a specific host
     *
     * @param int|string $id Host Id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getHostDetailsAsync($id): PromiseInterface
    {
        return $this->getHostDetailsAsyncWithHttpInfo($id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getHostDetailsAsyncWithHttpInfo
     *
     * Get detailed information about a specific host
     *
     * @param int|string $id Host Id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getHostDetailsAsyncWithHttpInfo($id): PromiseInterface
    {
        $url = $this->buildPath('host/{id}', compact('id'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(HostResponse::class);
        });
    }

    /**
     * Operation modifyHost
     *
     * Modify specific host
     *
     * @param int|string $id Host Id (required)
     * @param ModifyHostRequest $host  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return HostResponse
     */
    public function modifyHost($id, ModifyHostRequest $host): HostResponse
    {
        list($response) = $this->modifyHostWithHttpInfo($id, $host);
        return $response;
    }

    /**
     * Operation modifyHostWithHttpInfo
     *
     * Modify specific host
     *
     * @param int|string $id Host Id (required)
     * @param ModifyHostRequest $host  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of HostResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyHostWithHttpInfo($id, ModifyHostRequest $host): array
    {
        $url = $this->buildPath('host/{id}', compact('id'));

        $request = new Request('PATCH', $url, [], $host);

        $response = $this->client->send($request);
        return $response->toArray(HostResponse::class);
    }

    /**
     * Operation modifyHostAsync
     *
     * Modify specific host
     *
     * @param int|string $id Host Id (required)
     * @param ModifyHostRequest $host  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyHostAsync($id, ModifyHostRequest $host): PromiseInterface
    {
        return $this->modifyHostAsyncWithHttpInfo($id, $host)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyHostAsyncWithHttpInfo
     *
     * Modify specific host
     *
     * @param int|string $id Host Id (required)
     * @param ModifyHostRequest $host  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyHostAsyncWithHttpInfo($id, ModifyHostRequest $host): PromiseInterface
    {
        $url = $this->buildPath('host/{id}', compact('id'));

        $request = new Request('PATCH', $url, [], $host);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(HostResponse::class);
        });
    }
}
