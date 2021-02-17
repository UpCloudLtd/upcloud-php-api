<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\IPAddressApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\AssignIpResponse;
use Upcloud\ApiClient\Model\IpAddress;
use Upcloud\ApiClient\Model\IpAddressListResponse;
use Upcloud\ApiClient\Upcloud\IPAddressApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\IPAddressApiFixture;

/**
 * IPAddressApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class IPAddressApiAsyncTest extends BaseApiTest
{

    /**
     * @var IPAddressApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var IPAddressApiFixture
     */
    private $fixture;

    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new IPAddressApi($this->mock);
        $this->fixture = new IPAddressApiFixture;
    }

    public function testListIpsAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->listIpsAsync();


        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(IpAddressListResponse::class, $result = $promise->wait());

        $list = $result->getIpAddresses()->getIpAddress();
        $this->assertCount(5, $list);

        $fixtureList = $this->fixture->getResponse()->getIpAddresses()->getIpAddress();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(IpAddress::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetIpDetailsAsync()
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex()
        );

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->getDetailsAsync($this->fixture->ip);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(AssignIpResponse::class, $result = $promise->wait());

        $fixtureItem = $this->fixture->getResponseByIndex();

        $this->assertEquals($result, $fixtureItem);
    }

    public function testAssignIpAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRequestSuccess();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->addIpAsync($fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(AssignIpResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getIpAddress(), $fakeRequest->getIpAddress());
    }


    public function testThrowsExceptionOnAssignIpAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'ip_address',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->fixture->getRequestFailed();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->addIpAsync($fakeRequest)->wait();
    }

    public function testModifyIpAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequestSuccess();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyIpAsync($this->fixture->ip, $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(AssignIpResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getIpAddress(), $fakeRequest->getIpAddress());
    }

    public function testThrowsExceptionOnModifyIpAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'PATCH',
            $this->url . 'ip_address',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->fixture->getModifyRequestFailed();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyIpAsync($this->fixture->ip, $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteIpAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'DELETE',
            $this->url . 'ip_address/'. $this->fixture->ip,
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteIpAsync($this->fixture->ip)->wait();
    }
}
