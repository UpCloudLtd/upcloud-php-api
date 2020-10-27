<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\ZoneListResponse;

/**
 * ZoneApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class ZoneApi extends BaseApi
{
    /**
     * Operation listZones
     *
     * List available zones
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return ZoneListResponse
     */
    public function listZones()
    {
        list($response) = $this->listZonesWithHttpInfo();
        return $response;
    }

    /**
     * Operation listZonesWithHttpInfo
     *
     * List available zones
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of ZoneListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listZonesWithHttpInfo(): array
    {
        $request =  new Request('GET', 'zone');
        $response = $this->client->send($request);

        return $response->toArray(ZoneListResponse::class);
    }

    /**
     * Operation listZonesAsync
     *
     * List available zones
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listZonesAsync()
    {
        return $this->listZonesAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listZonesAsyncWithHttpInfo
     *
     * List available zones
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listZonesAsyncWithHttpInfo()
    {
        $request =  new Request('GET', 'zone');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(ZoneListResponse::class);
        });
    }
}
