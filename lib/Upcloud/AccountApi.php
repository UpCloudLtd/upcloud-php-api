<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\AccountResponse;

/**
 * AccountApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class AccountApi extends BaseApi
{
    /**
     * Operation getAccount
     *
     * Account information
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException | GuzzleException
     * @return AccountResponse
     */
    public function getAccount(): AccountResponse
    {
        list($response) = $this->getAccountWithHttpInfo();
        return $response;
    }

    /**
     * Operation getAccountWithHttpInfo
     *
     * Account information
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException | GuzzleException
     * @return array of AccountResponse,
     *                  HTTP status code,
     *                  HTTP response headers (array of strings)
     */
    public function getAccountWithHttpInfo(): array
    {
        $request = new Request('GET', 'account');
        $response = $this->client->send($request);

        return $response->toArray(AccountResponse::class);
    }

    /**
     * Operation getAccountAsync
     *
     * Account information
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getAccountAsync(): PromiseInterface
    {
        return $this->getAccountAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getAccountAsyncWithHttpInfo
     *
     * Account information
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getAccountAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'account');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->toArray(AccountResponse::class);
        });
    }
}
