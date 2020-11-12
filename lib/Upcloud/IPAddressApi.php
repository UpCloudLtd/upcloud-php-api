<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\AddIpRequest;
use Upcloud\ApiClient\Model\ModifyIpRequest;
use Upcloud\ApiClient\Model\AssignIpResponse;
use Upcloud\ApiClient\Model\IpAddressListResponse;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;

/**
 * IPAddressApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class IPAddressApi extends BaseApi
{

    /**
     * Operation addIp
     *
     * Assign IP address
     *
     * @param AddIpRequest|null $ipAddress  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return AssignIpResponse
     */
    public function addIp(?AddIpRequest $ipAddress = null): AssignIpResponse
    {
        list($response) = $this->addIpWithHttpInfo($ipAddress);
        return $response;
    }

    /**
     * Operation addIpWithHttpInfo
     *
     * Assign IP address
     *
     * @param AddIpRequest|null $ipAddress  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of AssignIpResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function addIpWithHttpInfo(?AddIpRequest $ipAddress = null): array
    {
        $request = new Request('POST', 'ip_address', [], $ipAddress);

        $response = $this->client->send($request);

        return $response->toArray(AssignIpResponse::class);
    }

    /**
     * Operation addIpAsync
     *
     * Assign IP address
     *
     * @param AddIpRequest|null $ipAddress  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function addIpAsync(?AddIpRequest $ipAddress = null): PromiseInterface
    {
        return $this->addIpAsyncWithHttpInfo($ipAddress)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation addIpAsyncWithHttpInfo
     *
     * Assign IP address
     *
     * @param AddIpRequest|null $ipAddress  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function addIpAsyncWithHttpInfo(?AddIpRequest $ipAddress = null): PromiseInterface
    {
        $request = new Request('POST', 'ip_address', [], $ipAddress);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(AssignIpResponse::class);
        });
    }

    /**
     * Operation deleteIp
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return void
     */
    public function deleteIp(string $ip): void
    {
        $this->deleteIpWithHttpInfo($ip);
    }

    /**
     * Operation deleteIpWithHttpInfo
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteIpWithHttpInfo(string $ip): array
    {
        $url = $this->buildPath('ip_address/{ip}', compact('ip'));
        $request = new Request('DELETE', $url);

        $response = $this->client->send($request);

        return $response->toArray();
    }

    /**
     * Operation deleteIpAsync
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteIpAsync(string $ip): PromiseInterface
    {
        return $this->deleteIpAsyncWithHttpInfo($ip)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteIpAsyncWithHttpInfo
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteIpAsyncWithHttpInfo(string $ip): PromiseInterface
    {
        $url = $this->buildPath('ip_address/{ip}', compact('ip'));
        $request = new Request('DELETE', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray();
        });
    }

    /**
     * Operation getDetails
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return AssignIpResponse
     */
    public function getDetails(string $ip): AssignIpResponse
    {
        list($response) = $this->getDetailsWithHttpInfo($ip);
        return $response;
    }

    /**
     * Operation getDetailsWithHttpInfo
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of AssignIpResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDetailsWithHttpInfo(string $ip): array
    {

        $url = $this->buildPath('ip_address/{ip}', compact('ip'));
        $request = new Request('GET', $url);

        $response = $this->client->send($request);

        return $response->toArray(AssignIpResponse::class);
    }

    /**
     * Operation getDetailsAsync
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDetailsAsync(string $ip): PromiseInterface
    {
        return $this->getDetailsAsyncWithHttpInfo($ip)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getDetailsAsyncWithHttpInfo
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDetailsAsyncWithHttpInfo(string $ip): PromiseInterface
    {
        $url = $this->buildPath('ip_address/{ip}', compact('ip'));
        $request = new Request('GET', $url);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(AssignIpResponse::class);
        });
    }

    /**
     * Operation listIps
     *
     * List IP addresses
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return IpAddressListResponse
     */
    public function listIps(): IpAddressListResponse
    {
        list($response) = $this->listIpsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listIpsWithHttpInfo
     *
     * List IP addresses
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of IpAddressListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listIpsWithHttpInfo(): array
    {
        $request = new Request('GET', 'ip_address');
        $response = $this->client->send($request);

        return $response->toArray(IpAddressListResponse::class);
    }

    /**
     * Operation listIpsAsync
     *
     * List IP addresses
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listIpsAsync(): PromiseInterface
    {
        return $this->listIpsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listIpsAsyncWithHttpInfo
     *
     * List IP addresses
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listIpsAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'ip_address');
        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(IpAddressListResponse::class);
        });
    }


    /**
     * Operation modifyIp
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param ModifyIpRequest|null $ipAddress  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return AssignIpResponse
     */
    public function modifyIp(string $ip, ?ModifyIpRequest $ipAddress = null): AssignIpResponse
    {
        list($response) = $this->modifyIpWithHttpInfo($ip, $ipAddress);
        return $response;
    }

    /**
     * Operation modifyIpWithHttpInfo
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param ModifyIpRequest|null $ipAddress  (optional)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of AssignIpResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyIpWithHttpInfo(string $ip, ?ModifyIpRequest $ipAddress = null): array
    {
        $url = $this->buildPath('ip_address/{ip}', compact('ip'));

        $request = new Request('PATCH', $url, [], $ipAddress);

        $response = $this->client->send($request);
        return $response->toArray(AssignIpResponse::class);
    }

    /**
     * Operation modifyIpAsync
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param ModifyIpRequest|null $ipAddress  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyIpAsync(string $ip, ?ModifyIpRequest $ipAddress = null): PromiseInterface
    {
        return $this->modifyIpAsyncWithHttpInfo($ip, $ipAddress)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyIpAsyncWithHttpInfo
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param ModifyIpRequest|null $ipAddress  (optional)
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function modifyIpAsyncWithHttpInfo(string $ip, ?ModifyIpRequest $ipAddress = null): PromiseInterface
    {
        $url = $this->buildPath('ip_address/{ip}', compact('ip'));

        $request = new Request('PATCH', $url, [], $ipAddress);

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(AssignIpResponse::class);
        });
    }
}
