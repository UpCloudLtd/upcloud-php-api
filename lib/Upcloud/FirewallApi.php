<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Model\FirewallRuleListResponse;
use Upcloud\ApiClient\Model\FirewallRuleRequest;
use Upcloud\ApiClient\Serializer;

/**
 * FirewallApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class FirewallApi extends BaseApi
{

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
     * @return array of FirewallRuleCreateResponse,
     *                  HTTP status code,
     *                  HTTP response headers (array of strings)
     * @throws InvalidArgumentException|GuzzleException
     * @throws ApiException on non-2xx response
     */
    public function createFirewallRuleWithHttpInfo(string $serverId, FirewallRuleRequest $firewallRule): array
    {
        $url = $this->buildPath('server/{serverId}/firewall_rule', compact('serverId'));
        $request = new Request('POST', $url, [], $firewallRule);

        $response = $this->client->send($request);

        return $response->setSerializer(new Serializer)->toArray(FirewallRuleCreateResponse::class);
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
            return $response->setSerializer(new Serializer)->toArray(FirewallRuleCreateResponse::class);
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
     * @return array of FirewallRuleCreateResponse,
     *                  HTTP status code,
     *                  HTTP response headers (array of strings)
     */
    public function getFirewallRuleWithHttpInfo(string $serverId, float $firewallRuleNumber): array
    {
        $url = $this->buildPath(
            'server/{serverId}/firewall_rule/{firewallRuleNumber}',
            compact('serverId', 'firewallRuleNumber')
        );

        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->setSerializer(new Serializer)->toArray(FirewallRuleCreateResponse::class);
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
            return $response->setSerializer(new Serializer)->toArray(FirewallRuleCreateResponse::class);
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
     * @return array of FirewallRuleListResponse,
     *                  HTTP status code,
     *                  HTTP response headers (array of strings)
     */
    public function serverServerIdFirewallRuleGetWithHttpInfo(string $serverId): array
    {

        $url = $this->buildPath('server/{serverId}/firewall_rule', compact('serverId'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->setSerializer(new Serializer)->toArray(FirewallRuleListResponse::class);
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

            return $response->setSerializer(new Serializer)->toArray(FirewallRuleListResponse::class);
        });
    }
}
