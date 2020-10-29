<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\StorageApi;

use Mockery;
use InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\CreateStorageResponse;
use Upcloud\ApiClient\Model\Server;
use Upcloud\ApiClient\Model\Storage;
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
class StorageApiTest extends BaseApiTest
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

    public function testListStorages(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response =  $this->api->listStorages();

        $list = $response->getStorages()->getStorage();
        $this->assertCount(4, $list);

        $fixtureList = $this->fixture->getResponse()->getStorages()->getStorage();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Storage::class, $item);
            $fixtureItem = $fixtureList[$key];

            foreach ($item->getters() as $property => $getter) {
                $this->assertEquals($item->$getter(), $fixtureItem->$getter());
            }
        }
    }

    public function testListStoragesWithType(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response =  $this->api->listStorages('normal');

        $list = $response->getStorages()->getStorage();
        $this->assertCount(4, $list);

        $fixtureList = $this->fixture->getResponse()->getStorages()->getStorage();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Storage::class, $item);
            $fixtureItem = $fixtureList[$key];

            foreach ($item->getters() as $property => $getter) {
                $this->assertEquals($item->$getter(), $fixtureItem->$getter());
            }
        }
    }

    public function testThrowsExceptionOnListStoragesWithType(): void
    {

        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->expectException(InvalidArgumentException::class);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);


        $this->api->listStorages('normals');
    }

    public function testGetStorageDetails(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $fakeRequest = $this->fixture->getCreateRequest();

        $response =  $this->api->getStorageDetails($fakeRequest->getStorage()->getUuid());
        $this->assertInstanceOf(CreateStorageResponse::class, $response);
        $this->assertEquals($response->getStorage(), $fakeRequest->getStorage());
    }

    public function testCreateStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->createStorage($fakeRequest);

        $this->assertEquals($response->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnCreateStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createStorage($fakeRequest);
    }

    public function testModifyStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->modifyStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);

        $this->assertEquals($response->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnModifyStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);
    }

    public function testAttachStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $fakeRequest =  $this->fixture->getAttachRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->attachStorage($this->serverId, $fakeRequest);

        $this->assertInstanceOf(CreateServerResponse::class, $response);
        $this->assertInstanceOf(Server::class, $server = $response->getServer());
        $storageDevice = $server->getStorageDevices()->getStorageDevice();
        $this->assertEquals($storageDevice[0]->getStorage(), $fakeRequest->getStorageDevice()->getStorage());
    }

    public function testThrowsExceptionOnAttachStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->attachStorage($this->serverId, $fakeRequest);
    }

    public function testDetachStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $fakeRequest =  $this->fixture->getDetachRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->detachStorage($this->serverId, $fakeRequest);
        $this->assertInstanceOf(CreateServerResponse::class, $response);
        $this->assertInstanceOf(Server::class, $server = $response->getServer());
        $storageDevice = $server->getStorageDevices()->getStorageDevice();
        $this->assertNotEquals($storageDevice[0]->getAddress(), $fakeRequest->getStorageDevice()->getStorage());
    }

    public function testThrowsExceptionOnDetachStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->detachStorage($this->serverId, $fakeRequest);
    }

    public function testLoadCdrom(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());

        $fakeRequest = $this->fixture->getLoadCdromRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->loadCdrom($this->serverId, $fakeRequest);

        $this->assertInstanceOf(CreateServerResponse::class, $response);
        $this->assertInstanceOf(Server::class, $server = $response->getServer());
        $storageDevice = $server->getStorageDevices()->getStorageDevice();
        $this->assertEquals($storageDevice[0]->getStorage(), $fakeRequest->getStorageDevice()->getStorage());
    }

    public function testThrowsExceptionOnLoadCdrom(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->loadCdrom($this->serverId, $fakeRequest);
    }

    public function testThrowsExceptionOnEjectCdrom(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->ejectCdrom($this->serverId);
    }

    public function testCloneStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest = $this->fixture->getCloneRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->cloneStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);


        $this->assertInstanceOf(CreateStorageResponse::class, $response);
        $this->assertEquals($response->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnCloneStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->cloneStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);
    }

    public function testThrowsExceptionOnCancelOperation(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->cancelOperation($fakeRequest->getStorage()->getUuid());
    }

    public function testTemplatizeStorage(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex(3)
        );

        $fakeRequest = $this->fixture->getTemplitizeStorageRequest(3);
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->templatizeStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);


        $this->assertInstanceOf(CreateStorageResponse::class, $response);
        $this->assertEquals($response->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnTemplatizeStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->cancelOperation($fakeRequest->getStorage()->getUuid());
    }

    public function testBackupStorage(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getResponseBodyByIndex(1)
        );

        $fakeRequest = $this->fixture->getBackupStorageRequest(1);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->backupStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);


        $this->assertInstanceOf(CreateStorageResponse::class, $response);
        $this->assertEquals($response->getStorage(), $fakeRequest->getStorage());
    }

    public function testThrowsExceptionOnBackupStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->backupStorage($fakeRequest->getStorage()->getUuid(), $fakeRequest);
    }

    public function testThrowsExceptionOnRestoreStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->restoreStorage($fakeRequest->getStorage()->getUuid());
    }

    public function testThrowsExceptionOnFavoriteStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->favoriteStorage($fakeRequest->getStorage()->getUuid());
    }

    public function testThrowsExceptionOnUnfavoriteStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->unfavoriteStorage($fakeRequest->getStorage()->getUuid());
    }

    public function testThrowsExceptionOnDeleteStorage(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteStorage($fakeRequest->getStorage()->getUuid());
    }
}
