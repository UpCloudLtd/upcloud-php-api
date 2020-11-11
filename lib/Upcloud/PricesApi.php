<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\PriceListResponse;
use Upcloud\ApiClient\Serializer;

/**
 * PricesApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class PricesApi extends BaseApi
{

    /**
     * Operation listPrices
     *
     * List prices
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return PriceListResponse
     */
    public function listPrices(): PriceListResponse
    {
        list($response) = $this->listPricesWithHttpInfo();
        return $response;
    }

    /**
     * Operation listPricesWithHttpInfo
     *
     * List prices
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of PriceListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPricesWithHttpInfo(): array
    {
        $request = new Request('GET', 'price');

        $response = $this->client->send($request);

        return $response->setSerializer(new Serializer)->toArray(PriceListResponse::class);
    }

    /**
     * Operation listPricesAsync
     *
     * List prices
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listPricesAsync(): PromiseInterface
    {
        return $this->listPricesAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listPricesAsyncWithHttpInfo
     *
     * List prices
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listPricesAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'price');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->setSerializer(new Serializer)->toArray(PriceListResponse::class);
        });
    }
}
