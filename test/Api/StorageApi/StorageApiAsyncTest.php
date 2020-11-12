<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\StorageApi;

use Mockery;
use InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\CreateStorageResponse;
use Upcloud\ApiClient\Model\Server;
use Upcloud\ApiClient\Model\Storage;
use Upcloud\ApiClient\Model\SuccessStoragesResponse;
use Upcloud\ApiClient\Upcloud\StorageApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\StorageApiFixture;

/**
 * StorageApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class StorageApiAsyncTest extends BaseApiTest
{

    /**
     * @var StorageApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var StorageApiFixture
     */
    private $fixture;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new StorageApi($this->mock);
        $this->fixture = new StorageApiFixture;
    }

    public function testListStoragesAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->listStoragesAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(SuccessStoragesResponse::class, $result = $promise->wait());

        $list = $result->getStorages()->getStorage();
        $this->assertCount(4, $list);

        $fixtureList = $this->fixture->getResponse()->getStorages()->getStorage();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Storage::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testListStoragesWithTypeAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->listStoragesAsync('normal');

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(SuccessStoragesResponse::class, $result = $promise->wait());

        $list = $result->getStorages()->getStorage();
        $this->assertCount(4, $list);

        $fixtureList = $this->fixture->getResponse()->getStorages()->getStorage();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Storage::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testThrowsExceptionOnListStoragesWithTypeAsync(): void
    {

        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $request = new Request(
            'GET',
            $this->url . 'storage/type',
            $this->fakeHeadersAsArray
        );
        $this->expectException(InvalidArgumentException::class);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));


        $this->api->listStoragesAsync('normals')->wait();
    }

    public function testGetStorageDetailsAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $fakeRequest = $this->fixture->getCreateRequest();

        $promise = $this->api->getStorageDetailsAsync($fakeRequest->getStorage()->getUuid());

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getStorage(), $fakeRequest->getStorage());
    }

    public function testCreateStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createStorageAsync($fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnCreateStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'storage',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createStorageAsync($fakeRequest)->wait();
    }

    public function testModifyStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnModifyStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'PUT',
            $this->url . 'tag',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest)->wait();
    }

    public function testAttachStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $fakeRequest =  $this->fixture->getAttachRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->attachStorageAsync($this->serverId, $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Server::class, $server = $result->getServer());
        $storageDevice = $server->getStorageDevices()->getStorageDevice();
        $this->assertEquals($storageDevice[0]->getStorage(), $fakeRequest->getStorageDevice()->getStorage());
    }

    public function testThrowsExceptionOnAttachStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId. '/storage/attach',
            $this->fakeHeadersAsArray
        );

        $fakeRequest =  $this->fixture->getAttachRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->attachStorageAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testDetachStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $fakeRequest =  $this->fixture->getDetachRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->detachStorageAsync($this->serverId, $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Server::class, $server = $result->getServer());
        $storageDevice = $server->getStorageDevices()->getStorageDevice();
        $this->assertNotEquals($storageDevice[0]->getAddress(), $fakeRequest->getStorageDevice()->getStorage());
    }

    public function testThrowsExceptionOnDetachStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId. '/storage/detach',
            $this->fakeHeadersAsArray
        );

        $fakeRequest =  $this->fixture->getDetachRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->detachStorageAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testLoadCdromAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $fakeRequest = $this->fixture->getLoadCdromRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->loadCdromAsync($this->serverId, $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Server::class, $server = $result->getServer());
        $storageDevice = $server->getStorageDevices()->getStorageDevice();
        $this->assertEquals($storageDevice[0]->getStorage(), $fakeRequest->getStorageDevice()->getStorage());
    }

    public function testThrowsExceptionOnLoadCdromAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId. '/cdrom/load',
            $this->fakeHeadersAsArray
        );

        $fakeRequest =  $this->fixture->getLoadCdromRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->loadCdromAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnEjectCdromAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId. '/cdrom/eject',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->ejectCdromAsync($this->serverId)->wait();
    }

    public function testCloneStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest = $this->fixture->getCloneRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->cloneStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest);


        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnCloneStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getCloneRequest();
        $request = new Request(
            'POST',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/clone',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->cloneStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnCancelOperationAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getCreateRequest();
        $request = new Request(
            'POST',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/cancel',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->cancelOperationAsync($fakeRequest->getStorage()->getUuid())->wait();
    }

    public function testTemplatizeStorageAsync(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex(3)
        );

        $fakeRequest = $this->fixture->getTemplitizeStorageRequest(3);
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->templatizeStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest);


        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnTemplatizeStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getTemplitizeStorageRequest(3);
        $request = new Request(
            'POST',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/templatize',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->cancelOperationAsync($fakeRequest->getStorage()->getUuid())->wait();
    }

    public function testBackupStorageAsync(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex(1)
        );

        $fakeRequest = $this->fixture->getBackupStorageRequest(1);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->backupStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest);


        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateStorageResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnBackupStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getBackupStorageRequest(1);
        $request = new Request(
            'POST',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/backup',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->backupStorageAsync($fakeRequest->getStorage()->getUuid(), $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnRestoreStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getBackupStorageRequest(1);
        $request = new Request(
            'POST',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/restore',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->restoreStorageAsync($fakeRequest->getStorage()->getUuid())->wait();
    }

    public function testThrowsExceptionOnFavoriteStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getCreateRequest();
        $request = new Request(
            'POST',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/favorite',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->favoriteStorageAsync($fakeRequest->getStorage()->getUuid())->wait();
    }

    public function testThrowsExceptionOnUnfavoriteStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getCreateRequest();
        $request = new Request(
            'DELETE',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid().'/restore',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->unfavoriteStorageAsync($fakeRequest->getStorage()->getUuid())->wait();
    }

    public function testThrowsExceptionOnDeleteStorageAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $fakeRequest = $this->fixture->getCreateRequest();
        $request = new Request(
            'DELETE',
            $this->url . 'storage/'.$fakeRequest->getStorage()->getUuid(),
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteStorageAsync($fakeRequest->getStorage()->getUuid())->wait();
    }
}
