<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\IPAddressApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\AssignIpResponse;
use Upcloud\ApiClient\Model\IpAddress;
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
class IPAddressApiTest extends BaseApiTest
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

    public function testListIps(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response =  $this->api->listIps();


        $list = $response->getIpAddresses()->getIpAddress();
        $this->assertCount(5, $list);

        $fixtureList = $this->fixture->getResponse()->getIpAddresses()->getIpAddress();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(IpAddress::class, $item);
            $fixtureItem = $fixtureList[$key];

            foreach ($item->getters() as $property => $getter) {
                $this->assertEquals($item->$getter(), $fixtureItem->$getter());
            }
        }
    }

    public function testGetIpDetails(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex()
        );

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response =  $this->api->getDetails($this->fixture->ip);

        $this->assertInstanceOf(AssignIpResponse::class, $response);

        $fixtureItem = $this->fixture->getResponseByIndex();

        $this->assertEquals($response, $fixtureItem);
    }

    public function testAssignIp(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRequestSuccess();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->addIp($fakeRequest);

        $this->assertEquals($response->getIpAddress(), $fakeRequest->getIpAddress());
    }


    public function testThrowsExceptionOnAssignIp(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->addIp($fakeRequest);
    }

    public function testModifyIp(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequestSuccess();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->modifyIp($this->fixture->ip, $fakeRequest);

        $this->assertEquals($response->getIpAddress(), $fakeRequest->getIpAddress());
    }

    public function testThrowsExceptionOnModifyIp(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyIp($this->fixture->ip, $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteIp(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteIp($this->fixture->ip);
    }
}
