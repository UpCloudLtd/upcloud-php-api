<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\Model\AvailablePlanListResponse;
use Upcloud\ApiClient\Serializer;

/**
 * PlanApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class PlanApi extends BaseApi
{

    /**
     * Operation listPlans
     *
     * List available plans
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return AvailablePlanListResponse
     */
    public function listPlans(): AvailablePlanListResponse
    {
        list($response) = $this->listPlansWithHttpInfo();
        return $response;
    }

    /**
     * Operation listPlansWithHttpInfo
     *
     * List available plans
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     * @return array of AvailablePlanListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPlansWithHttpInfo(): array
    {
        $request = new Request('GET', 'plan');
        $response = $this->client->send($request);
        return $response->setSerializer(new Serializer)->toArray(AvailablePlanListResponse::class);
    }

    /**
     * Operation listPlansAsync
     *
     * List available plans
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listPlansAsync(): PromiseInterface
    {
        return $this->listPlansAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listPlansAsyncWithHttpInfo
     *
     * List available plans
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function listPlansAsyncWithHttpInfo(): PromiseInterface
    {
        $request = new Request('GET', 'plan');

        return $this->client->sendAsync($request)->then(function (UpcloudApiResponse $response) {
            return $response->setSerializer(new Serializer)->toArray(AvailablePlanListResponse::class);
        });
    }
}
