<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\ObjectStorage;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\ObjectStorage;
use Upcloud\ApiClient\Model\ObjectStorageResponse;
use Upcloud\ApiClient\Upcloud\ObjectStorageApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\ObjectStorageApiFixture;

class ObjectStorageTest extends BaseApiTest
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

    public function testGetListObjectStorage()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('object-storage', (string)$request->getUri());
                return true;
            })
            ->andReturn($response);

        $response = $this->api->getListObjectStorage();

        $list = $response->getObjectStorages()->getObjectStorage();

        $fixtureList = $this->fixture->getResponse()->getObjectStorages()->getObjectStorage();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(ObjectStorage::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetObjectStorageDetails(): void
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
                $this->assertEquals(
                    'object-storage/' . $fixtureItem->getObjectStorage()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->getObjectStorageDetails($fixtureItem->getObjectStorage()->getUuid());

        $this->assertInstanceOf(ObjectStorageResponse::class, $response);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testCreateObjectStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $fixtureItem = $this->fixture->getResponseByIndex();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('object-storage', (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->createObjectStorage($fakeRequest);

        $this->assertEquals($response, $fixtureItem);
    }

    public function testThrowsExceptionOnCreateObjectStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createObjectStorage($fakeRequest);
    }

    public function testModifyObjectStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('PATCH', $request->getMethod());
                $this->assertEquals(
                    'object-storage/' . $fakeRequest->getObjectStorage()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->modifyObjectStorage($fakeRequest->getObjectStorage()->getUuid(), $fakeRequest);

        $this->assertEquals($response->getObjectStorage(), $fakeRequest->getObjectStorage());
    }

    public function testThrowsExceptionOnModifyObjectStorage(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getModifyRequest();
        $request = new Request(
            'PATCH',
            $this->url . 'object-storage/' . $fakeRequest->getObjectStorage()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyObjectStorage($fakeRequest->getObjectStorage()->getUuid(), $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteObjectStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'object-storage/' . $fakeRequest->getObjectStorage()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteObjectStorage($fakeRequest->getObjectStorage()->getUuid());
    }
}
