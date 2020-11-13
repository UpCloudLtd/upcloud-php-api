<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Hosts;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\Host;
use Upcloud\ApiClient\Model\HostListResponse;
use Upcloud\ApiClient\Model\HostResponse;
use Upcloud\ApiClient\Upcloud\HostsApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\HostsApiFixture;

class HostsApiTest extends BaseApiTest
{
    /**
     * @var HostsApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var HostsApiFixture
     */
    private $fixture;


    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new HostsApi($this->mock);
        $this->fixture = new HostsApiFixture;
    }

    public function testGetListHosts()
    {

        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('host', (string) $request->getUri());
                return true;
            })
            ->andReturn($response);

        $response = $this->api->getListHosts();

        $list = $response->getHosts()->getHost();
        $this->assertCount(2, $list);

        $fixtureList = $this->fixture->getResponse()->getHosts()->getHost();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Host::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetListHostsAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('host', (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getListHostsAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(HostListResponse::class, $result = $promise->wait());
        $list = $result->getHosts()->getHost();
        $this->assertCount(2, $list);
        $fixtureList = $this->fixture->getResponse()->getHosts()->getHost();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Host::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetHostDetails(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex()
        );

        $fixtureItem = $this->fixture->getResponseByIndex();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fixtureItem) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('host/' . $fixtureItem->getHost()->getId(), (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->getHostDetails($fixtureItem->getHost()->getId());

        $this->assertInstanceOf(HostResponse::class, $response);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testGetHostDetailsAsync(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex()
        );

        $fixtureItem = $this->fixture->getResponseByIndex();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fixtureItem) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('host/' . $fixtureItem->getHost()->getId(), (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->getHostDetailsAsync($fixtureItem->getHost()->getId());

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(HostResponse::class, $result = $promise->wait());

        $this->assertEquals($result, $fixtureItem);
    }

    public function testModifyHost(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PATCH', $request->getMethod());
                $this->assertEquals('host/' . $fakeRequest->getHost()->getId(), (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->modifyHost($fakeRequest->getHost()->getId(), $fakeRequest);

        $this->assertEquals($response->getHost(), $fakeRequest->getHost());
    }

    public function testThrowsExceptionOnModifyHost(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'PATCH',
            $this->url . 'host/'. $fakeRequest->getHost()->getId(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyHost($fakeRequest->getHost()->getId(), $fakeRequest);
    }

    public function testModifyHostAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PATCH', $request->getMethod());
                $this->assertEquals('host/' . $fakeRequest->getHost()->getId(), (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyHostAsync($fakeRequest->getHost()->getId(), $fakeRequest);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(HostResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getHost(), $fakeRequest->getHost());
    }

    public function testThrowsExceptionOnModifyHostAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'PATCH',
            $this->url . 'host/'. $fakeRequest->getHost()->getId(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

            $this->api->modifyHostAsync($fakeRequest->getHost()->getId(), $fakeRequest)->wait();
    }
}
