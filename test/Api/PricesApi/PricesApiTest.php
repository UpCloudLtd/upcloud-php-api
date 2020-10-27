<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\PricesApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\Model\PriceListResponse;
use Upcloud\ApiClient\Upcloud\PricesApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\PricesApiFixture;

/**
 * PricesApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class PricesApiTest extends BaseApiTest
{
    /**
     * @var PricesApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var PricesApiFixture
     */
    private $fixture;

    /**
     * Setup before running any test cases.
     */
    public function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new PricesApi($this->mock);
        $this->fixture = new PricesApiFixture;
    }

    public function testListPrices(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->listPrices();

        $this->assertInstanceOf(PriceListResponse::class, $response);
        $this->assertEquals($response, $this->fixture->getResponse());
    }

    public function testListPlansAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->listPricesAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(PriceListResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponse());
    }
}
