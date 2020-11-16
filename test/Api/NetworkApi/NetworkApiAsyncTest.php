<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\NetworkApi;

use GuzzleHttp\Exception\RequestException;
use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\Network;
use Upcloud\ApiClient\Model\NetworkInterface;
use Upcloud\ApiClient\Model\NetworkInterfaceResponse;
use Upcloud\ApiClient\Model\NetworkResponse;
use Upcloud\ApiClient\Model\NetworksListResponse;
use Upcloud\ApiClient\Model\Router;
use Upcloud\ApiClient\Model\RouterResponse;
use Upcloud\ApiClient\Model\RoutersListResponse;
use Upcloud\ApiClient\Model\ServerNetworksListResponse;
use Upcloud\ApiClient\Upcloud\NetworkApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\NetworkApiFixture;

class NetworkApiAsyncTest extends BaseApiTest
{
    /**
     * @var NetworkApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var NetworkApiFixture
     */
    private $fixture;


    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new NetworkApi($this->mock);
        $this->fixture = new NetworkApiFixture;
    }

    public function testGetListNetworksAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('network', (string)$request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getListNetworksAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworksListResponse::class, $result = $promise->wait());

        $list = $result->getNetworks()->getNetwork();

        $fixtureList = $this->fixture->getResponse()->getNetworks()->getNetwork();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Network::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetListNetworksWithZone()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('network/?zone=fi-hel1', (string)$request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getListNetworksAsync('fi-hel1');

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworksListResponse::class, $result = $promise->wait());

        $list = $result->getNetworks()->getNetwork();

        $fixtureList = $this->fixture->getResponse()->getNetworks()->getNetwork();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Network::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetNetworkDetails(): void
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
                $this->assertEquals('network/' . $fixtureItem->getNetwork()->getUuid(), (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->getNetworkDetailsAsync($fixtureItem->getNetwork()->getUuid());

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworkResponse::class, $result = $promise->wait());

        $this->assertEquals($result, $fixtureItem);
    }

    public function testCreateNetworkAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('network', (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createNetworkAsync($fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworkResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponseByIndex());
    }

    public function testThrowsExceptionOnCreateNetworkAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'network',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('network', (string) $request->getUri());
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createNetworkAsync($fakeRequest)->wait();
    }

    public function testModifyNetworkAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {

                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'network/' . $fakeRequest->getNetwork()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyNetworkAsync($fakeRequest->getNetwork()->getUuid(), $fakeRequest);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworkResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getNetwork(), $fakeRequest->getNetwork());
    }

    public function testThrowsExceptionOnModifyNetworkAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'PUT',
            $this->url . 'network/'. $fakeRequest->getNetwork()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyNetworkAsync($fakeRequest->getNetwork()->getUuid(), $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteNetworkAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'DELETE',
            $this->url . 'network/'. $fakeRequest->getNetwork()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'network/' . $fakeRequest->getNetwork()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteNetworkAsync($fakeRequest->getNetwork()->getUuid())->wait();
    }

    public function testGetListServerNetworksAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking',
                    (string)$request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getListServerNetworksAsync($this->serverId);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ServerNetworksListResponse::class, $result = $promise->wait());

        $list = $result->getNetworking()->getInterfaces()->getInterface();

        $fixtureList = $this->fixture->getServerResponse()->getNetworking()->getInterfaces()->getInterface();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(NetworkInterface::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testCreateNetworkInterfaceAsync(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getNetworkInterfaceResponseBodyByIndex()
        );

        $fakeRequest = $this->fixture->getCreateNetworkInterfaceRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createNetworkInterfaceAsync($this->serverId, $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworkInterfaceResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getNetworkInterfaceResponseByIndex());
    }

    public function testThrowsExceptionOnCreateNetworkInterfaceAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId.'/networking/interface',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->fixture->getCreateNetworkInterfaceRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createNetworkInterfaceAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testModifyNetworkInterfaceAsync(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getNetworkInterfaceResponseBodyByIndex()
        );

        $fakeRequest = $this->fixture->getModifyNetworkInterfaceRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {

                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface/' . $fakeRequest->getInterface()->getIndex(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyNetworkInterfaceAsync(
            $this->serverId,
            $fakeRequest->getInterface()->getIndex(),
            $fakeRequest
        );
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(NetworkInterfaceResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getNetworkInterfaceResponseByIndex());
    }

    public function testThrowsExceptionOnModifyNetworkInterfaceAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyNetworkInterfaceRequest();
        $request = new Request(
            'PUT',
            'server/'.$this->serverId.'/networking/interface/' . $fakeRequest->getInterface()->getIndex(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyNetworkInterfaceAsync(
            $this->serverId,
            $fakeRequest->getInterface()->getIndex(),
            $fakeRequest
        )->wait();
    }

    public function testThrowsExceptionOnDeleteNetworkInterfaceAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyNetworkInterfaceRequest();

        $index = $fakeRequest->getInterface()->getIndex();
        $request = new Request(
            'DELETE',
            'server/'.$this->serverId.'/networking/interface/'. $index,
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($index) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface/'. $index,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteNetworkInterfaceAsync($this->serverId, $index)->wait();
    }

    public function testGetListRoutersAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('router', (string)$request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getListRoutersAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(RoutersListResponse::class, $result = $promise->wait());

        $list = $result->getRouters()->getRouter();

        $fixtureList = $this->fixture->getRouterResponse()->getRouters()->getRouter();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Router::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetRouterDetails(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getRouterResponseBodyByIndex()
        );

        $fixtureItem = $this->fixture->getRouterResponseByIndex();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fixtureItem) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('router/' . $fixtureItem->getRouter()->getUuid(), (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->getRouterDetailsAsync($fixtureItem->getRouter()->getUuid());

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(RouterResponse::class, $result = $promise->wait());

        $this->assertEquals($result, $fixtureItem);
    }

    public function testCreateRouterAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRouterRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('router', (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createRouterAsync($fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(RouterResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getRouterResponseByIndex());
    }

    public function testThrowsExceptionOnCreateRouterAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'router',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBodyByIndex());

        $fakeRequest = $this->fixture->getRouterRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('router', (string) $request->getUri());
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createRouterAsync($fakeRequest)->wait();
    }

    public function testModifyRouterAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRouterRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {

                $this->assertEquals('PATCH', $request->getMethod());
                $this->assertEquals(
                    'router/' . $fakeRequest->getRouter()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyRouterAsync($fakeRequest->getRouter()->getUuid(), $fakeRequest);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(RouterResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getRouter(), $fakeRequest->getRouter());
    }

    public function testThrowsExceptionOnModifyRouterAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getRouterRequest();
        $request = new Request(
            'PATCH',
            $this->url . 'router/'. $fakeRequest->getRouter()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyRouterAsync($fakeRequest->getRouter()->getUuid(), $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteRouterAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getRouterRequest();
        $request = new Request(
            'DELETE',
            $this->url . 'router/'. $fakeRequest->getRouter()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'router/' . $fakeRequest->getRouter()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteRouterAsync($fakeRequest->getRouter()->getUuid())->wait();
    }
}
