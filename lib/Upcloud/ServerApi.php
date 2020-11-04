<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use InvalidArgumentException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\AttachStorageDeviceRequest;
use Upcloud\ApiClient\Model\ConfigurationListResponse;
use Upcloud\ApiClient\Model\CreateServerRequest;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Model\FirewallRuleListResponse;
use Upcloud\ApiClient\Model\FirewallRuleRequest;
use Upcloud\ApiClient\Model\ModifyServerRequest;
use Upcloud\ApiClient\Model\RestartServer;
use Upcloud\ApiClient\Model\ServerListResponse;
use Upcloud\ApiClient\Model\StopServer;
use Upcloud\ApiClient\Model\StorageDeviceDetachRequest;
use Upcloud\ApiClient\Model\StorageDeviceLoadRequest;

/**
 * ServerApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class ServerApi extends BaseApi
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
        $request = new Request('POST', $url);

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
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation attachStorage
     *
     * Attach storage
     *
     * @param string $serverId Server id (required)
     * @param AttachStorageDeviceRequest $storageDevice (required)
     * @return CreateServerResponse
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
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
     * @throws ApiException on non-2xx response
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
     * Operation createFirewallRule
     *
     * Create firewall rule
     *
     * @param string $serverId Server id (required)
     * @param FirewallRuleRequest $firewallRule  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return FirewallRuleCreateResponse
     */
    public function createFirewallRule(string $serverId, FirewallRuleRequest $firewallRule): FirewallRuleCreateResponse
    {
        list($response) = $this->createFirewallRuleWithHttpInfo($serverId, $firewallRule);
        return $response;
    }

    /**
     * Operation createFirewallRuleWithHttpInfo
     *
     * Create firewall rule
     *
     * @param string $serverId Server id (required)
     * @param FirewallRuleRequest $firewallRule  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of FirewallRuleCreateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createFirewallRuleWithHttpInfo(string $serverId, FirewallRuleRequest $firewallRule): array
    {
        $url = $this->buildPath('server/{serverId}/firewall_rule', compact('serverId'));
        $request = new Request('POST', $url, [], $firewallRule);

        $response = $this->client->send($request);
        return $response->toArray(FirewallRuleCreateResponse::class);
    }

    /**
     * Operation createFirewallRuleAsync
     *
     * Create firewall rule
     *
     * @param string $serverId Server id (required)
     * @param FirewallRuleRequest $firewallRule  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createFirewallRuleAsync(string $serverId, FirewallRuleRequest $firewallRule): PromiseInterface
    {
        return $this->createFirewallRuleAsyncWithHttpInfo($serverId, $firewallRule)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createFirewallRuleAsyncWithHttpInfo
     *
     * Create firewall rule
     *
     * @param string $serverId Server id (required)
     * @param FirewallRuleRequest $firewallRule  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createFirewallRuleAsyncWithHttpInfo(
        string $serverId,
        FirewallRuleRequest $firewallRule
    ): PromiseInterface {
        $url = $this->buildPath('server/{serverId}/firewall_rule', compact('serverId'));
        $request = new Request('POST', $url, [], $firewallRule);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(FirewallRuleCreateResponse::class);
        });
    }

    /**
     * Operation createServer
     *
     * Create server
     *
     * @param CreateServerRequest|null $server  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function createServer(?CreateServerRequest $server = null): CreateServerResponse
    {
        list($response) = $this->createServerWithHttpInfo($server);
        return $response;
    }

    /**
     * Operation createServerWithHttpInfo
     *
     * Create server
     *
     * @param CreateServerRequest|null $server  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createServerWithHttpInfo(?CreateServerRequest $server = null): array
    {
        $request = new Request('POST', 'server', [], $server);
        $response = $this->client->send($request);

        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation createServerAsync
     *
     * Create server
     *
     * @param CreateServerRequest|null $server  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createServerAsync(?CreateServerRequest $server = null): PromiseInterface
    {
        return $this->createServerAsyncWithHttpInfo($server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createServerAsyncWithHttpInfo
     *
     * Create server
     *
     * @param CreateServerRequest|null $server  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createServerAsyncWithHttpInfo(?CreateServerRequest $server = null): PromiseInterface
    {
        $request = new Request('POST', 'server', [], $server);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation deleteFirewallRule
     *
     * Remove firewall rule
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteFirewallRule(string $serverId, float $firewallRuleNumber): void
    {
        $this->deleteFirewallRuleWithHttpInfo($serverId, $firewallRuleNumber);
    }

    /**
     * Operation deleteFirewallRuleWithHttpInfo
     *
     * Remove firewall rule
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteFirewallRuleWithHttpInfo(string $serverId, float $firewallRuleNumber): array
    {
        $url = $this->buildPath(
            'server/{serverId}/firewall_rule/{firewallRuleNumber}',
            compact('serverId', 'firewallRuleNumber')
        );

        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteFirewallRuleAsync
     *
     * Remove firewall rule
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteFirewallRuleAsync(string $serverId, float $firewallRuleNumber): PromiseInterface
    {
        return $this->deleteFirewallRuleAsyncWithHttpInfo($serverId, $firewallRuleNumber)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteFirewallRuleAsyncWithHttpInfo
     *
     * Remove firewall rule
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteFirewallRuleAsyncWithHttpInfo(string $serverId, float $firewallRuleNumber): PromiseInterface
    {
        $url = $this->buildPath(
            'server/{serverId}/firewall_rule/{firewallRuleNumber}',
            compact('serverId', 'firewallRuleNumber')
        );

        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation deleteServer
     *
     * Delete server
     *
     * @param string $serverId Id of server to delete (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteServer(string $serverId): void
    {
        $this->deleteServerWithHttpInfo($serverId);
    }

    /**
     * Operation deleteServerWithHttpInfo
     *
     * Delete server
     *
     * @param string $serverId Id of server to delete (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteServerWithHttpInfo(string $serverId): array
    {
        $url = $this->buildPath('server/{serverId}', compact('serverId'));
        $request =  new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteServerAsync
     *
     * Delete server
     *
     * @param string $serverId Id of server to delete (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteServerAsync(string $serverId): PromiseInterface
    {
        return $this->deleteServerAsyncWithHttpInfo($serverId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteServerAsyncWithHttpInfo
     *
     * Delete server
     *
     * @param string $serverId Id of server to delete (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteServerAsyncWithHttpInfo(string $serverId): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}', compact('serverId'));
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
     * @throws ApiException on non-2xx response
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
     * @throws ApiException on non-2xx response
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

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation ejectCdrom
     *
     * Eject CD-ROM
     *
     * @param string $serverId Server id (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function ejectCdrom(string $serverId): void
    {
        $this->ejectCdromWithHttpInfo($serverId);
    }

    /**
     * Operation ejectCdromWithHttpInfo
     *
     * Eject CD-ROM
     *
     * @param string $serverId Server id (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ejectCdromWithHttpInfo(string $serverId): array
    {
        $url = $this->buildPath('server/{serverId}/cdrom/eject', compact('serverId'));
        $request = new Request('POST', $url);

        $response = $this->client->send($request);
        return $response->toArray();
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
            return $response->toArray();
        });
    }

    /**
     * Operation getFirewallRule
     *
     * Get firewall rule details
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return FirewallRuleCreateResponse
     */
    public function getFirewallRule(string $serverId, float $firewallRuleNumber): FirewallRuleCreateResponse
    {
        list($response) = $this->getFirewallRuleWithHttpInfo($serverId, $firewallRuleNumber);
        return $response;
    }

    /**
     * Operation getFirewallRuleWithHttpInfo
     *
     * Get firewall rule details
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of FirewallRuleCreateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFirewallRuleWithHttpInfo(string $serverId, float $firewallRuleNumber): array
    {
        $url = $this->buildPath(
            'server/{serverId}/firewall_rule/{firewallRuleNumber}',
            compact('serverId', 'firewallRuleNumber')
        );
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(FirewallRuleCreateResponse::class);
    }

    /**
     * Operation getFirewallRuleAsync
     *
     * Get firewall rule details
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getFirewallRuleAsync(string $serverId, float $firewallRuleNumber): PromiseInterface
    {
        return $this->getFirewallRuleAsyncWithHttpInfo($serverId, $firewallRuleNumber)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getFirewallRuleAsyncWithHttpInfo
     *
     * Get firewall rule details
     *
     * @param string $serverId Server id (required)
     * @param float $firewallRuleNumber Denotes the index of the firewall rule
     *                                  in the server&#39;s firewall rule list (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getFirewallRuleAsyncWithHttpInfo(string $serverId, float $firewallRuleNumber): PromiseInterface
    {
        $url = $this->buildPath(
            'server/{serverId}/firewall_rule/{firewallRuleNumber}',
            compact('serverId', 'firewallRuleNumber')
        );
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(FirewallRuleCreateResponse::class);
        });
    }

    /**
     * Operation listServerConfigurations
     *
     * List server configurations
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ConfigurationListResponse
     */
    public function listServerConfigurations(): ConfigurationListResponse
    {
        list($response) = $this->listServerConfigurationsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listServerConfigurationsWithHttpInfo
     *
     * List server configurations
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of ConfigurationListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listServerConfigurationsWithHttpInfo(): array
    {
        $request = new Request('GET', 'server_size');

        $response = $this->client->send($request);
        return $response->toArray(ConfigurationListResponse::class);
    }

    /**
     * Operation listServerConfigurationsAsync
     *
     * List server configurations
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listServerConfigurationsAsync(): PromiseInterface
    {
        return $this->listServerConfigurationsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listServerConfigurationsAsyncWithHttpInfo
     *
     * List server configurations
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listServerConfigurationsAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'server_size');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ConfigurationListResponse::class);
        });
    }

    /**
     * Operation listServers
     *
     * List of servers
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ServerListResponse
     */
    public function listServers(): ServerListResponse
    {
        list($response) = $this->listServersWithHttpInfo();
        return $response;
    }

    /**
     * Operation listServersWithHttpInfo
     *
     * List of servers
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of ServerListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listServersWithHttpInfo(): array
    {
        $request = new Request('GET', 'server');

        $response = $this->client->send($request);
        return $response->toArray(ServerListResponse::class);
    }

    /**
     * Operation listServersAsync
     *
     * List of servers
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listServersAsync(): PromiseInterface
    {
        return $this->listServersAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listServersAsyncWithHttpInfo
     *
     * List of servers
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listServersAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'server');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ServerListResponse::class);
        });
    }

    /**
     * Operation loadCdrom
     *
     * Load CD-ROM
     *
     * @param string $serverId Server id (required)
     * @param StorageDeviceLoadRequest|null $storageDevice  (optional)
     * @throws ApiException on non-2xx response
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function loadCdromWithHttpInfo(string $serverId, ?StorageDeviceLoadRequest $storageDevice = null): array
    {

        $url = $this->buildPath('server/{serverId}/cdrom/load', compact('serverId'));
        $request = new Request('POST', $url, [], $storageDevice);

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
        $request = new Request('POST', $url, [], $storageDevice);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation modifyServer
     *
     * Modify server
     *
     * @param string $serverId Id of server to modify (required)
     * @param ModifyServerRequest|null $server  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function modifyServer(string $serverId, ?ModifyServerRequest $server = null): CreateServerResponse
    {
        list($response) = $this->modifyServerWithHttpInfo($serverId, $server);
        return $response;
    }

    /**
     * Operation modifyServerWithHttpInfo
     *
     * Modify server
     *
     * @param string $serverId Id of server to modify (required)
     * @param ModifyServerRequest|null $server  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyServerWithHttpInfo(string $serverId, ?ModifyServerRequest $server = null): array
    {
        $url = $this->buildPath('server/{serverId}', compact('serverId'));
        $request = new Request('PUT', $url, [], $server);

        $response = $this->client->send($request);
        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation modifyServerAsync
     *
     * Modify server
     *
     * @param string $serverId Id of server to modify (required)
     * @param ModifyServerRequest|null $server  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyServerAsync(string $serverId, ?ModifyServerRequest $server = null): PromiseInterface
    {
        return $this->modifyServerAsyncWithHttpInfo($serverId, $server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyServerAsyncWithHttpInfo
     *
     * Modify server
     *
     * @param string $serverId Id of server to modify (required)
     * @param ModifyServerRequest|null $server  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyServerAsyncWithHttpInfo(
        string $serverId,
        ?ModifyServerRequest $server = null
    ): PromiseInterface {
        $url = $this->buildPath('server/{serverId}', compact('serverId'));
        $request = new Request('PUT', $url, [], $server);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation restartServer
     *
     * Restart server
     *
     * @param string $serverId Id of server to restart (required)
     * @param RestartServer $restartServer  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function restartServer(string $serverId, RestartServer $restartServer): CreateServerResponse
    {
        list($response) = $this->restartServerWithHttpInfo($serverId, $restartServer);
        return $response;
    }

    /**
     * Operation restartServerWithHttpInfo
     *
     * Restart server
     *
     * @param string $serverId Id of server to restart (required)
     * @param RestartServer $restartServer  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function restartServerWithHttpInfo(string $serverId, RestartServer $restartServer): array
    {
        $url = $this->buildPath('server/{serverId}/restart', compact('serverId'));
        $request = new Request('POST', $url, [], $restartServer);

        $response = $this->client->send($request);
        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation restartServerAsync
     *
     * Restart server
     *
     * @param string $serverId Id of server to restart (required)
     * @param RestartServer $restartServer  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function restartServerAsync(string $serverId, RestartServer $restartServer): PromiseInterface
    {
        return $this->restartServerAsyncWithHttpInfo($serverId, $restartServer)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation restartServerAsyncWithHttpInfo
     *
     * Restart server
     *
     * @param string $serverId Id of server to restart (required)
     * @param RestartServer $restartServer  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function restartServerAsyncWithHttpInfo(string $serverId, RestartServer $restartServer): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/restart', compact('serverId'));
        $request = new Request('POST', $url, [], $restartServer);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation serverDetails
     *
     * Get server details
     *
     * @param string $serverId Id of server to return (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function serverDetails(string $serverId): CreateServerResponse
    {
        list($response) = $this->serverDetailsWithHttpInfo($serverId);
        return $response;
    }

    /**
     * Operation serverDetailsWithHttpInfo
     *
     * Get server details
     *
     * @param string $serverId Id of server to return (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function serverDetailsWithHttpInfo(string $serverId): array
    {
        $url = $this->buildPath('server/{serverId}', compact('serverId'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);
        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation serverDetailsAsync
     *
     * Get server details
     *
     * @param string $serverId Id of server to return (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function serverDetailsAsync(string $serverId): PromiseInterface
    {
        return $this->serverDetailsAsyncWithHttpInfo($serverId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation serverDetailsAsyncWithHttpInfo
     *
     * Get server details
     *
     * @param string $serverId Id of server to return (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function serverDetailsAsyncWithHttpInfo(string $serverId): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}', compact('serverId'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function ($response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation serverServerIdFirewallRuleGet
     *
     * List firewall rules
     *
     * @param string $serverId Server id (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return FirewallRuleListResponse
     */
    public function serverServerIdFirewallRuleGet(string $serverId): FirewallRuleListResponse
    {
        list($response) = $this->serverServerIdFirewallRuleGetWithHttpInfo($serverId);
        return $response;
    }

    /**
     * Operation serverServerIdFirewallRuleGetWithHttpInfo
     *
     * List firewall rules
     *
     * @param string $serverId Server id (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of FirewallRuleListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function serverServerIdFirewallRuleGetWithHttpInfo(string $serverId): array
    {
        $url = $this->buildPath('server/{serverId}/firewall_rule', compact('serverId'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);
        return $response->toArray(FirewallRuleListResponse::class);
    }

    /**
     * Operation serverServerIdFirewallRuleGetAsync
     *
     * List firewall rules
     *
     * @param string $serverId Server id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function serverServerIdFirewallRuleGetAsync(string $serverId): PromiseInterface
    {
        return $this->serverServerIdFirewallRuleGetAsyncWithHttpInfo($serverId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation serverServerIdFirewallRuleGetAsyncWithHttpInfo
     *
     * List firewall rules
     *
     * @param string $serverId Server id (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function serverServerIdFirewallRuleGetAsyncWithHttpInfo(string $serverId): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/firewall_rule', compact('serverId'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(FirewallRuleListResponse::class);
        });
    }

    /**
     * Operation startServer
     *
     * Start server
     *
     * @param string $serverId Id of server to start (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function startServer(string $serverId): CreateServerResponse
    {
        list($response) = $this->startServerWithHttpInfo($serverId);
        return $response;
    }

    /**
     * Operation startServerWithHttpInfo
     *
     * Start server
     *
     * @param string $serverId Id of server to start (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function startServerWithHttpInfo(string $serverId): array
    {
        $url = $this->buildPath('server/{serverId}/start', compact('serverId'));
        $request = new Request('POST', $url);

        $response = $this->client->send($request);
        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation startServerAsync
     *
     * Start server
     *
     * @param string $serverId Id of server to start (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function startServerAsync(string $serverId): PromiseInterface
    {
        return $this->startServerAsyncWithHttpInfo($serverId)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation startServerAsyncWithHttpInfo
     *
     * Start server
     *
     * @param string $serverId Id of server to start (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function startServerAsyncWithHttpInfo(string $serverId): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/start', compact('serverId'));
        $request = new Request('POST', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
        });
    }

    /**
     * Operation stopServer
     *
     * Stop server
     *
     * @param string $serverId Id of server to stop (required)
     * @param StopServer $stopServerRequest  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return CreateServerResponse
     */
    public function stopServer(string $serverId, StopServer $stopServerRequest): CreateServerResponse
    {
        list($response) = $this->stopServerWithHttpInfo($serverId, $stopServerRequest);
        return $response;
    }

    /**
     * Operation stopServerWithHttpInfo
     *
     * Stop server
     *
     * @param string $serverId Id of server to stop (required)
     * @param StopServer $stopServerRequest  (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function stopServerWithHttpInfo(string $serverId, StopServer $stopServerRequest): array
    {
        $url = $this->buildPath('server/{serverId}/stop', compact('serverId'));
        $request = new Request('POST', $url, [], $stopServerRequest);

        $response = $this->client->send($request);
        return $response->toArray(CreateServerResponse::class);
    }

    /**
     * Operation stopServerAsync
     *
     * Stop server
     *
     * @param string $serverId Id of server to stop (required)
     * @param StopServer $stopServerRequest  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function stopServerAsync(string $serverId, StopServer $stopServerRequest): PromiseInterface
    {
        return $this->stopServerAsyncWithHttpInfo($serverId, $stopServerRequest)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation stopServerAsyncWithHttpInfo
     *
     * Stop server
     *
     * @param string $serverId Id of server to stop (required)
     * @param StopServer $stopServerRequest  (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function stopServerAsyncWithHttpInfo(string $serverId, StopServer $stopServerRequest): PromiseInterface
    {
        $url = $this->buildPath('server/{serverId}/stop', compact('serverId'));
        $request = new Request('POST', $url, [], $stopServerRequest);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(CreateServerResponse::class);
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
