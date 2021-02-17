<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\ZoneApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\Model\ZoneListResponse;
use Upcloud\ApiClient\Upcloud\ZoneApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\ZoneApiFixture;

/**
 * ZoneApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class ZoneApiTest extends BaseApiTest
{
    /**
     * @var ZoneApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var ZoneApiFixture
     */
    private $fixture;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new ZoneApi($this->mock);
        $this->fixture = new ZoneApiFixture;
    }

    public function testListZones(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->listZones();

        $this->assertInstanceOf(ZoneListResponse::class, $response);
        $this->assertEquals($response, $this->fixture->getResponse());
    }

    public function testListZonesAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->listZonesAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ZoneListResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponse());
    }
}
