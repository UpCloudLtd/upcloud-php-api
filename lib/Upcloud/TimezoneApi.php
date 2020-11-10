<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\TimezoneListResponse;
use Upcloud\ApiClient\Serializer;

/**
 * TimezoneApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class TimezoneApi extends BaseApi
{

    /**
     * Operation listTimezones
     *
     * List timezones
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return TimezoneListResponse
     */
    public function listTimezones(): TimezoneListResponse
    {
        list($response) = $this->listTimezonesWithHttpInfo();
        return $response;
    }

    /**
     * Operation listTimezonesWithHttpInfo
     *
     * List timezones
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array ofTimezoneListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTimezonesWithHttpInfo(): array
    {
        $request = new Request('GET', 'timezone');
        $response = $this->client->send($request);

        return $response->setSerializer(new Serializer)->toArray(TimezoneListResponse::class);
    }

    /**
     * Operation listTimezonesAsync
     *
     * List timezones
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listTimezonesAsync(): PromiseInterface
    {
        return $this->listTimezonesAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listTimezonesAsyncWithHttpInfo
     *
     * List timezones
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listTimezonesAsyncWithHttpInfo()
    {
        $request = new Request('GET', 'timezone');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->setSerializer(new Serializer)->toArray(TimezoneListResponse::class);
        });
    }
}
