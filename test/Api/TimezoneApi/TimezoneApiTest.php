<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\TimezoneApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\Model\TimezoneListResponse;
use Upcloud\ApiClient\Upcloud\TimezoneApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\TimezoneApiFixture;

/**
 * TimezoneApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class TimezoneApiTest extends BaseApiTest
{
    /**
     * @var TimezoneApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var TimezoneApiFixture
     */
    private $fixture;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new TimezoneApi($this->mock);
        $this->fixture = new TimezoneApiFixture;
    }

    public function testListTimezones(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->listTimezones();

        $this->assertInstanceOf(TimezoneListResponse::class, $response);
        $this->assertEquals($response, $this->fixture->getResponse());
    }

    public function testListTimezonesAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->listTimezonesAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(TimezoneListResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponse());
    }
}
