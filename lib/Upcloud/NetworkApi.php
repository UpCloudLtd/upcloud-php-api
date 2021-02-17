<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use GuzzleHttp\Exception\GuzzleException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\CreateNetworkInterfaceRequest;
use Upcloud\ApiClient\Model\CreateNetworkRequest;
use Upcloud\ApiClient\Model\ModifyNetworkInterfaceRequest;
use Upcloud\ApiClient\Model\ModifyNetworkRequest;
use Upcloud\ApiClient\Model\NetworkInterfaceResponse;
use Upcloud\ApiClient\Model\NetworkResponse;
use Upcloud\ApiClient\Model\NetworksListResponse;
use Upcloud\ApiClient\Model\RouterRequest;
use Upcloud\ApiClient\Model\RouterResponse;
use Upcloud\ApiClient\Model\RoutersListResponse;
use Upcloud\ApiClient\Model\ServerNetworksListResponse;

class NetworkApi extends BaseApi
{
    /**
     * Operation getListNetworks
     *
     * List of networks
     *
     * @param string|null $zone
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return NetworksListResponse
     */
    public function getListNetworks(?string $zone = null): NetworksListResponse
    {
        list($response) = $this->getListNetworksWithHttpInfo($zone);
        return $response;
    }

    /**
     * Operation getListNetworksWithHttpInfo
     *
     * List of networks
     *
     * @param string|null $zone
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of NetworksListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getListNetworksWithHttpInfo(?string $zone = null): array
    {
        $url ='network';

        if ($zone) {
            $url = $this->buildPath($url . '/?zone={zone}', compact('zone'));
        }

        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(NetworksListResponse::class);
    }

    /**
     * Operation getListNetworksAsync
     *
     * List of networks
     *
     * @param string|null $zone
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListNetworksAsync(?string $zone = null): PromiseInterface
    {
        return $this->getListNetworksAsyncWithHttpInfo($zone)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getListNetworksAsyncWithHttpInfo
     *
     * List of networks
     *
     * @param string|null $zone
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListNetworksAsyncWithHttpInfo(?string $zone = null): PromiseInterface
    {
        $url ='network';

        if ($zone) {
            $url = $this->buildPath($url . '/?zone={zone}', compact('zone'));
        }

        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(NetworksListResponse::class);
        });
    }

    /**
     * Operation getNetworkDetails
     *
     * Get detailed information about a specific network
     *
     * @param string $uuid Network Uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return NetworkResponse
     */
    public function getNetworkDetails(string $uuid): NetworkResponse
    {
        list($response) = $this->getNetworkDetailsWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation getNetworkDetailsWithHttpInfo
     *
     * Get detailed information about a specific network
     *
     * @param string $uuid Network Uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of NetworkResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getNetworkDetailsWithHttpInfo(string $uuid): array
    {

        $url = $this->buildPath('network/{uuid}', compact('uuid'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(NetworkResponse::class);
    }

    /**
     * Operation getNetworkDetailsAsync
     *
     * Get detailed information about a specific network
     *
     * @param string $uuid Network Uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getNetworkDetailsAsync(string $uuid): PromiseInterface
    {
        return $this->getNetworkDetailsAsyncWithHttpInfo($uuid)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getNetworkDetailsAsyncWithHttpInfo
     *
     * Get detailed information about a specific network
     *
     * @param string $uuid Network Uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getNetworkDetailsAsyncWithHttpInfo(string $uuid): PromiseInterface
    {
        $url = $this->buildPath('network/{uuid}', compact('uuid'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(NetworkResponse::class);
        });
    }

    /**
     * Operation createNetwork
     *
     * Create a new SDN private network
     *
     * @param CreateNetworkRequest $network (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return NetworkResponse
     */
    public function createNetwork(CreateNetworkRequest $network): NetworkResponse
    {
        list($response) = $this->createNetworkWithHttpInfo($network);
        return $response;
    }

    /**
     * Operation createNetworkWithHttpInfo
     *
     * Create a new SDN private network
     *
     * @param CreateNetworkRequest $network (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of NetworkResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createNetworkWithHttpInfo(CreateNetworkRequest $network): array
    {
        $request = new Request('POST', 'network', [], $network);
        $response = $this->client->send($request);

        return $response->toArray(NetworkResponse::class);
    }

    /**
     * Operation createNetworkAsync
     *
     * Create a new SDN private network
     *
     * @param CreateNetworkRequest $network (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createNetworkAsync(CreateNetworkRequest $network): PromiseInterface
    {
        return $this->createNetworkAsyncWithHttpInfo($network)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createNetworkAsyncWithHttpInfo
     *
     * Create a new SDN private network
     *
     * @param CreateNetworkRequest $network  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createNetworkAsyncWithHttpInfo(CreateNetworkRequest $network): PromiseInterface
    {
        $request = new Request('POST', 'network', [], $network);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(NetworkResponse::class);
        });
    }

    /**
     * Operation modifyNetwork
     *
     * Modifies the details of a specific SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @param ModifyNetworkRequest $network  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return NetworkResponse
     */
    public function modifyNetwork(string $uuid, ModifyNetworkRequest $network): NetworkResponse
    {
        list($response) = $this->modifyNetworkWithHttpInfo($uuid, $network);
        return $response;
    }

    /**
     * Operation modifyNetworkWithHttpInfo
     *
     * Modifies the details of a specific SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @param ModifyNetworkRequest $network  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of  NetworkResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyNetworkWithHttpInfo(string $uuid, ModifyNetworkRequest $network): array
    {
        $url = $this->buildPath('network/{uuid}', compact('uuid'));

        $request = new Request('PUT', $url, [], $network);

        $response = $this->client->send($request);
        return $response->toArray(NetworkResponse::class);
    }

    /**
     * Operation modifyNetworkAsync
     *
     * Modifies the details of a specific SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @param ModifyNetworkRequest $network  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyNetworkAsync(string $uuid, ModifyNetworkRequest $network): PromiseInterface
    {
        return $this->modifyNetworkAsyncWithHttpInfo($uuid, $network)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyNetworkAsyncWithHttpInfo
     *
     * Modifies the details of a specific SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @param ModifyNetworkRequest $network  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyNetworkAsyncWithHttpInfo(
        string $uuid,
        ModifyNetworkRequest $network
    ): PromiseInterface {
        $url = $this->buildPath('network/{uuid}', compact('uuid'));

        $request = new Request('PUT', $url, [], $network);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(NetworkResponse::class);
        });
    }

    /**
     * Operation deleteNetwork
     *
     * Deletes an SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteNetwork(string $uuid): void
    {
        $this->deleteNetworkWithHttpInfo($uuid);
    }

    /**
     * Operation deleteNetworkWithHttpInfo
     *
     * Deletes an SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteNetworkWithHttpInfo(string $uuid): array
    {
        $url = $this->buildPath('network/{uuid}', compact('uuid'));
        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteNetworkAsync
     *
     * Deletes an SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteNetworkAsync(string $uuid): PromiseInterface
    {
        return $this->deleteNetworkAsyncWithHttpInfo($uuid)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteNetworkAsyncWithHttpInfo
     *
     * Deletes an SDN private network
     *
     * @param string $uuid Network uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteNetworkAsyncWithHttpInfo(string $uuid): PromiseInterface
    {
        $url = $this->buildPath('network/{uuid}', compact('uuid'));
        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation getListServerNetworks
     *
     * List networks the specific cloud server
     *
     * @param string $server
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ServerNetworksListResponse
     */
    public function getListServerNetworks(string $server): ServerNetworksListResponse
    {
        list($response) = $this->getListServerNetworksWithHttpInfo($server);
        return $response;
    }

    /**
     * Operation getListServerNetworksWithHttpInfo
     *
     * List networks the specific cloud server
     *
     * @param string $server
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of ServerNetworksListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getListServerNetworksWithHttpInfo(string $server): array
    {
        $url = $this->buildPath('server/{server}/networking', compact('server'));

        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(ServerNetworksListResponse::class);
    }

    /**
     * Operation getListServerNetworksAsync
     *
     * List networks the specific cloud server
     *
     * @param string $server
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListServerNetworksAsync(string $server): PromiseInterface
    {
        return $this->getListServerNetworksAsyncWithHttpInfo($server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getListServerNetworksAsyncWithHttpInfo
     *
     * List networks the specific cloud server
     *
     * @param string $server
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListServerNetworksAsyncWithHttpInfo(string $server): PromiseInterface
    {
        $url = $this->buildPath('server/{server}/networking', compact('server'));

        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(ServerNetworksListResponse::class);
        });
    }

    /**
     * Operation createNetworkInterface
     *
     * Create a new network interface on the specific cloud server
     *
     * @param string $server
     * @param CreateNetworkInterfaceRequest $network (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return NetworkInterfaceResponse
     */
    public function createNetworkInterface(
        string $server,
        CreateNetworkInterfaceRequest $network
    ): NetworkInterfaceResponse {
        list($response) = $this->createNetworkInterfaceWithHttpInfo($server, $network);
        return $response;
    }

    /**
     * Operation createNetworkInterfaceWithHttpInfo
     *
     * Create a new network interface on the specific cloud server
     *
     * @param string $server
     * @param CreateNetworkInterfaceRequest $network (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of NetworkInterfaceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createNetworkInterfaceWithHttpInfo(string $server, CreateNetworkInterfaceRequest $network): array
    {
        $url = $this->buildPath('server/{server}/networking/interface', compact('server'));

        $request = new Request('POST', $url, [], $network);

        $response = $this->client->send($request);

        return $response->toArray(NetworkInterfaceResponse::class);
    }

    /**
     * Operation createNetworkInterfaceAsync
     *
     * Create a new network interface on the specific cloud server
     *
     * @param string $server
     * @param CreateNetworkInterfaceRequest $network (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createNetworkInterfaceAsync(
        string $server,
        CreateNetworkInterfaceRequest $network
    ): PromiseInterface {
        return $this->createNetworkInterfaceAsyncWithHttpInfo($server, $network)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createNetworkInterfaceAsyncWithHttpInfo
     *
     * Create a new network interface on the specific cloud server
     *
     * @param string $server
     * @param CreateNetworkInterfaceRequest $network  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createNetworkInterfaceAsyncWithHttpInfo(
        string $server,
        CreateNetworkInterfaceRequest $network
    ): PromiseInterface {
        $url = $this->buildPath('server/{server}/networking/interface', compact('server'));
        $request = new Request('POST', $url, [], $network);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(NetworkInterfaceResponse::class);
        });
    }

    /**
     * Operation modifyNetworkInterface
     *
     * Modifies network interface at the selected index on the specific cloud server
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to modify (required)
     * @param ModifyNetworkInterfaceRequest $network  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return NetworkInterfaceResponse
     */
    public function modifyNetworkInterface(
        string $server,
        int $index,
        ModifyNetworkInterfaceRequest $network
    ): NetworkInterfaceResponse {
        list($response) = $this->modifyNetworkInterfaceWithHttpInfo($server, $index, $network);
        return $response;
    }

    /**
     * Operation modifyNetworkInterfaceWithHttpInfo
     *
     * Modifies network interface at the selected index on the specific cloud server
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to modify (required)
     * @param ModifyNetworkInterfaceRequest $network  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of  NetworkInterfaceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyNetworkInterfaceWithHttpInfo(
        string $server,
        int $index,
        ModifyNetworkInterfaceRequest $network
    ): array {
        $url = $this->buildPath(
            'server/{server}/networking/interface/{index}',
            compact('server', 'index')
        );

        $request = new Request('PUT', $url, [], $network);

        $response = $this->client->send($request);
        return $response->toArray(NetworkInterfaceResponse::class);
    }

    /**
     * Operation modifyNetworkInterfaceAsync
     *
     * Modifies network interface at the selected index on the specific cloud server
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to modify (required)
     * @param ModifyNetworkInterfaceRequest $network  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyNetworkInterfaceAsync(
        string $server,
        int $index,
        ModifyNetworkInterfaceRequest $network
    ): PromiseInterface {
        return $this->modifyNetworkInterfaceAsyncWithHttpInfo($server, $index, $network)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyNetworkInterfaceAsyncWithHttpInfo
     *
     * Modifies network interface at the selected index on the specific cloud server
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to modify (required)
     * @param ModifyNetworkInterfaceRequest $network  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyNetworkInterfaceAsyncWithHttpInfo(
        string $server,
        int $index,
        ModifyNetworkInterfaceRequest $network
    ): PromiseInterface {
        $url = $this->buildPath(
            'server/{server}/networking/interface/{index}',
            compact('server', 'index')
        );

        $request = new Request('PUT', $url, [], $network);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(NetworkInterfaceResponse::class);
        });
    }

    /**
     * Operation deleteNetworkInterface
     *
     * Detaches an SDN private network from a cloud server by deleting the network interface at the selected index
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to delete (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteNetworkInterface(string $server, int $index): void
    {
        $this->deleteNetworkInterfaceWithHttpInfo($server, $index);
    }

    /**
     * Operation deleteNetworkInterfaceWithHttpInfo
     *
     * Detaches an SDN private network from a cloud server by deleting the network interface at the selected index
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to delete (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteNetworkInterfaceWithHttpInfo(string $server, int $index): array
    {
        $url = $this->buildPath(
            'server/{server}/networking/interface/{index}',
            compact('server', 'index')
        );

        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteNetworkInterfaceAsync
     *
     * Detaches an SDN private network from a cloud server by deleting the network interface at the selected index
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to delete (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteNetworkInterfaceAsync(string $server, int $index): PromiseInterface
    {
        return $this->deleteNetworkInterfaceAsyncWithHttpInfo($server, $index)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteNetworkInterfaceAsyncWithHttpInfo
     *
     * Detaches an SDN private network from a cloud server by deleting the network interface at the selected index
     *
     * @param string $server Server uuid (required)
     * @param int $index Index of the interface to delete (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteNetworkInterfaceAsyncWithHttpInfo(string $server, int $index): PromiseInterface
    {
        $url = $this->buildPath(
            'server/{server}/networking/interface/{index}',
            compact('server', 'index')
        );

        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation getListRouters
     *
     * List of all available routers
     *
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return RoutersListResponse
     */
    public function getListRouters(): RoutersListResponse
    {
        list($response) = $this->getListRoutersWithHttpInfo();
        return $response;
    }

    /**
     * Operation getListRoutersWithHttpInfo
     *
     * List of all available routers
     *
     * @throws ApiException  on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of RoutersListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getListRoutersWithHttpInfo(): array
    {
        $request = new Request('GET', 'router');

        $response = $this->client->send($request);

        return $response->toArray(RoutersListResponse::class);
    }

    /**
     * Operation getListRoutersAsync
     *
     * List of all available routers
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListRoutersAsync(): PromiseInterface
    {
        return $this->getListRoutersAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getListRoutersAsyncWithHttpInfo
     *
     * List of all available routers
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getListRoutersAsyncWithHttpInfo(): PromiseInterface
    {

        $request = new Request('GET', 'router');

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(RoutersListResponse::class);
        });
    }

    /**
     * Operation getRouterDetails
     *
     * Get detailed information about a specific Router
     *
     * @param string $uuid Router Uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return RouterResponse
     */
    public function getRouterDetails(string $uuid): RouterResponse
    {
        list($response) = $this->getRouterDetailsWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation getRouterDetailsWithHttpInfo
     *
     * Get detailed information about a specific Router
     *
     * @param string $uuid Router Uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of RouterResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRouterDetailsWithHttpInfo(string $uuid): array
    {

        $url = $this->buildPath('router/{uuid}', compact('uuid'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(RouterResponse::class);
    }

    /**
     * Operation getRouterDetailsAsync
     *
     * Get detailed information about a specific Router
     *
     * @param string $uuid Router Uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getRouterDetailsAsync(string $uuid): PromiseInterface
    {
        return $this->getRouterDetailsAsyncWithHttpInfo($uuid)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getRouterDetailsAsyncWithHttpInfo
     *
     * Get detailed information about a specific Router
     *
     * @param string $uuid Router Uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getRouterDetailsAsyncWithHttpInfo(string $uuid): PromiseInterface
    {
        $url = $this->buildPath('router/{uuid}', compact('uuid'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(RouterResponse::class);
        });
    }

    /**
     * Operation createRouter
     *
     * Create a new router
     *
     * @param RouterRequest $router (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return RouterResponse
     */
    public function createRouter(RouterRequest $router): RouterResponse
    {
        list($response) = $this->createRouterWithHttpInfo($router);
        return $response;
    }

    /**
     * Operation createRouterWithHttpInfo
     *
     * Create a new router
     *
     * @param RouterRequest $router (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of RouterResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createRouterWithHttpInfo(RouterRequest $router): array
    {
        $request = new Request('POST', 'router', [], $router);

        $response = $this->client->send($request);

        return $response->toArray(RouterResponse::class);
    }

    /**
     * Operation createRouterAsync
     *
     * Create a new router
     *
     * @param RouterRequest $router (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createRouterAsync(RouterRequest $router): PromiseInterface
    {
        return $this->createRouterAsyncWithHttpInfo($router)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createRouterAsyncWithHttpInfo
     *
     * Create a new router
     *
     * @param RouterRequest $router  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createRouterAsyncWithHttpInfo(RouterRequest $router): PromiseInterface
    {
        $request = new Request('POST', 'router', [], $router);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(RouterResponse::class);
        });
    }

    /**
     * Operation modifyRouter
     *
     * Modify an existing router
     *
     * @param string $uuid Router uuid (required)
     * @param RouterRequest $router  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return RouterResponse
     */
    public function modifyRouter(string $uuid, RouterRequest $router): RouterResponse
    {
        list($response) = $this->modifyRouterWithHttpInfo($uuid, $router);
        return $response;
    }

    /**
     * Operation modifyRouterWithHttpInfo
     *
     * Modify an existing router
     *
     * @param string $uuid Router uuid (required)
     * @param RouterRequest $router (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of  RouterResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyRouterWithHttpInfo(string $uuid, RouterRequest $router): array
    {
        $url = $this->buildPath('router/{uuid}', compact('uuid'));

        $request = new Request('PATCH', $url, [], $router);

        $response = $this->client->send($request);
        return $response->toArray(RouterResponse::class);
    }

    /**
     * Operation modifyRouterAsync
     *
     * Modify an existing router
     *
     * @param string $uuid Router uuid (required)
     * @param RouterRequest $router  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyRouterAsync(string $uuid, RouterRequest $router): PromiseInterface
    {
        return $this->modifyRouterAsyncWithHttpInfo($uuid, $router)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyRouterAsyncWithHttpInfo
     *
     * Modify an existing router
     *
     * @param string $uuid Router uuid (required)
     * @param RouterRequest $router  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyRouterAsyncWithHttpInfo(
        string $uuid,
        RouterRequest $router
    ): PromiseInterface {
        $url = $this->buildPath('router/{uuid}', compact('uuid'));

        $request = new Request('PATCH', $url, [], $router);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(RouterResponse::class);
        });
    }

    /**
     * Operation deleteRouter
     *
     * Delete an existing router
     *
     * @param string $uuid Router uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteRouter(string $uuid): void
    {
        $this->deleteRouterWithHttpInfo($uuid);
    }

    /**
     * Operation deleteRouterWithHttpInfo
     *
     * Delete an existing router
     *
     * @param string $uuid Router uuid (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteRouterWithHttpInfo(string $uuid): array
    {
        $url = $this->buildPath('router/{uuid}', compact('uuid'));
        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteRouterAsync
     *
     * Delete an existing router
     *
     * @param string $uuid Router uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteRouterAsync(string $uuid): PromiseInterface
    {
        return $this->deleteRouterAsyncWithHttpInfo($uuid)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteRouterAsyncWithHttpInfo
     *
     * Delete an existing router
     *
     * @param string $uuid Router uuid (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteRouterAsyncWithHttpInfo(string $uuid): PromiseInterface
    {
        $url = $this->buildPath('router/{uuid}', compact('uuid'));
        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

}
