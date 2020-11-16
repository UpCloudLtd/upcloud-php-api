<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\NetworkApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\Network;
use Upcloud\ApiClient\Model\NetworkInterface;
use Upcloud\ApiClient\Model\NetworkResponse;
use Upcloud\ApiClient\Model\Router;
use Upcloud\ApiClient\Model\RouterResponse;
use Upcloud\ApiClient\Upcloud\NetworkApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\NetworkApiFixture;

class NetworkApiTest extends BaseApiTest
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

    public function testGetListNetworks()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('network', (string)$request->getUri());
                return true;
            })
            ->andReturn($response);

        $response = $this->api->getListNetworks();

        $list = $response->getNetworks()->getNetwork();

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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('network/?zone=fi-hel1', (string)$request->getUri());
                return true;
            })
            ->andReturn($response);

        $response = $this->api->getListNetworks('fi-hel1');

        $list = $response->getNetworks()->getNetwork();

        $fixtureList = $this->fixture->getResponse()->getNetworks()->getNetwork();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Network::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetNetworkDetails(): void
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
                $this->assertEquals('network/' . $fixtureItem->getNetwork()->getUuid(), (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->getNetworkDetails($fixtureItem->getNetwork()->getUuid());

        $this->assertInstanceOf(NetworkResponse::class, $response);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testCreateNetwork(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $fixtureItem = $this->fixture->getResponseByIndex();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('network', (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->createNetwork($fakeRequest);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testThrowsExceptionOnCreateNetwork(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('network', (string) $request->getUri());
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createNetwork($fakeRequest);
    }

    public function testModifyNetwork(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'network/' . $fakeRequest->getNetwork()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->modifyNetwork($fakeRequest->getNetwork()->getUuid(), $fakeRequest);

        $this->assertEquals($response->getNetwork(), $fakeRequest->getNetwork());
    }

    public function testThrowsExceptionOnModifyNetwork(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'PUT',
            $this->url . 'network/' . $fakeRequest->getNetwork()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyNetwork($fakeRequest->getNetwork()->getUuid(), $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteNetwork(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'network/' . $fakeRequest->getNetwork()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteNetwork($fakeRequest->getNetwork()->getUuid());
    }

    public function testGetListServerNetworks()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking',
                    (string)$request->getUri()
                );
                return true;
            })
            ->andReturn($response);

        $response = $this->api->getListServerNetworks($this->serverId);

        $list = $response->getNetworking()->getInterfaces()->getInterface();

        $fixtureList = $this->fixture->getServerResponse()->getNetworking()->getInterfaces()->getInterface();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(NetworkInterface::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testCreateNetworkInterface(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getNetworkInterfaceResponseBodyByIndex()
        );

        $fakeRequest = $this->fixture->getCreateNetworkInterfaceRequest();
        $fixtureItem = $this->fixture->getNetworkInterfaceResponseByIndex();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->createNetworkInterface($this->serverId, $fakeRequest);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testThrowsExceptionOnCreateNetworkInterface(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createNetworkInterface($this->serverId, $fakeRequest);
    }

    public function testModifyNetworkInterface(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getNetworkInterfaceResponseBodyByIndex()
        );

        $fakeRequest = $this->fixture->getModifyNetworkInterfaceRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface/' . $fakeRequest->getInterface()->getIndex(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->modifyNetworkInterface(
            $this->serverId,
            $fakeRequest->getInterface()->getIndex(),
            $fakeRequest
        );

        $this->assertEquals($response, $this->fixture->getNetworkInterfaceResponseByIndex());
    }

    public function testThrowsExceptionOnModifyNetworkInterface(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyNetworkInterfaceRequest();
        $request = new Request(
            'PUT',
            $this->url . 'server/'.$this->serverId.'/networking/interface/' . $fakeRequest->getInterface()->getIndex(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyNetworkInterface(
            $this->serverId,
            $fakeRequest->getInterface()->getIndex(),
            $fakeRequest
        );
    }

    public function testThrowsExceptionOnDeleteNetworkInterface(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($index) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/networking/interface/'. $index,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteNetworkInterface($this->serverId, $index);
    }

    public function testGetListRouters()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('router', (string)$request->getUri());
                return true;
            })
            ->andReturn($response);

        $response = $this->api->getListRouters();


        $list = $response->getRouters()->getRouter();

        $fixtureList = $this->fixture->getRouterResponse()->getRouters()->getRouter();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Router::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetRouterDetails(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getRouterResponseBodyByIndex()
        );

        $fixtureItem = $this->fixture->getRouterResponseByIndex();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fixtureItem) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('router/' . $fixtureItem->getRouter()->getUuid(), (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->getRouterDetails($fixtureItem->getRouter()->getUuid());

        $this->assertInstanceOf(RouterResponse::class, $response);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testCreateRouter(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRouterRequest();
        $fixtureItem = $this->fixture->getRouterResponseByIndex();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('router', (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->createRouter($fakeRequest);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testThrowsExceptionOnCreateRouter(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'router',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->fixture->getRouterRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('router', (string) $request->getUri());
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createRouter($fakeRequest);
    }

    public function testModifyRouter(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRouterResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRouterRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PATCH', $request->getMethod());
                $this->assertEquals(
                    'router/' . $fakeRequest->getRouter()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->modifyRouter($fakeRequest->getRouter()->getUuid(), $fakeRequest);

        $this->assertEquals($response->getRouter(), $fakeRequest->getRouter());
    }

    public function testThrowsExceptionOnModifyRouter(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getRouterRequest();
        $request = new Request(
            'PATCH',
            $this->url . 'router/' . $fakeRequest->getRouter()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyRouter($fakeRequest->getRouter()->getUuid(), $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteRouter(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'router/' . $fakeRequest->getRouter()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteRouter($fakeRequest->getRouter()->getUuid());
    }
}
