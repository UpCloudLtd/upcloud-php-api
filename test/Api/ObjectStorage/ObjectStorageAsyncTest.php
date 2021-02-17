<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\ObjectStorage;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\ObjectStorage;
use Upcloud\ApiClient\Model\ObjectStorageListResponse;
use Upcloud\ApiClient\Model\ObjectStorageResponse;
use Upcloud\ApiClient\Upcloud\ObjectStorageApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\ObjectStorageApiFixture;

class ObjectStorageAsyncTest extends BaseApiTest
{
    /**
     * @var ObjectStorageApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var ObjectStorageApiFixture
     */
    private $fixture;


    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new ObjectStorageApi($this->mock);
        $this->fixture = new ObjectStorageApiFixture;
    }

    public function testGetListObjectStorageAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('object-storage', (string)$request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getListObjectStorageAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ObjectStorageListResponse::class, $result = $promise->wait());
        $list = $result->getObjectStorages()->getObjectStorage();


        $fixtureList = $this->fixture->getResponse()->getObjectStorages()->getObjectStorage();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(ObjectStorage::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetObjectStorageDetailsAsync(): void
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
                $this->assertEquals(
                    'object-storage/' . $fixtureItem->getObjectStorage()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->getObjectStorageDetailsAsync($fixtureItem->getObjectStorage()->getUuid());

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ObjectStorageResponse::class, $result = $promise->wait());

        $this->assertEquals($result, $fixtureItem);
    }

    public function testCreateObjectStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('object-storage', (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createObjectStorageAsync($fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ObjectStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponseByIndex());
    }

    public function testThrowsExceptionOnCreateObjectStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'object-storage',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createObjectStorageAsync($fakeRequest)->wait();
    }


    public function testModifyObjectStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PATCH', $request->getMethod());
                $this->assertEquals(
                    'object-storage/' . $fakeRequest->getObjectStorage()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyObjectStorageAsync($fakeRequest->getObjectStorage()->getUuid(), $fakeRequest);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ObjectStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getObjectStorage(), $fakeRequest->getObjectStorage());
    }

    public function testThrowsExceptionOnModifyObjectStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'PATCH',
            $this->url . 'object-storage/'. $fakeRequest->getObjectStorage()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyObjectStorageAsync($fakeRequest->getObjectStorage()->getUuid(), $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteObjectStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'DELETE',
            $this->url . 'object-storage/'. $fakeRequest->getObjectStorage()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'object-storage/' . $fakeRequest->getObjectStorage()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteObjectStorageAsync($fakeRequest->getObjectStorage()->getUuid())->wait();
    }
}
