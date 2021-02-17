<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\TagApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\CreateNewTagResponse;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\Server;
use Upcloud\ApiClient\Model\TagListResponse;
use Upcloud\ApiClient\Upcloud\TagApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\TagApiFixture;

/**
 * TagApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class TagApiAsyncTest extends BaseApiTest
{

    /**
     * @var TagApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var TagApiFixture
     */
    private $fixture;

    /**
     * Setup before running any test cases.
     */
    public function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new TagApi($this->mock);
        $this->fixture = new TagApiFixture;
    }

    public function testListTagsAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->listTagsAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(TagListResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponse());
    }

    public function testCreateTagAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createTagAsync($fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateNewTagResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getCreateResponse());
    }

    public function testThrowsExceptionOnCreateTagAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'tag',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createTagAsync($fakeRequest)->wait();
    }

    public function testModifyTagAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyTagAsync('TEST', $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateNewTagResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getCreateResponse());
    }

    public function testThrowsExceptionOnModifyTagAsync(): void
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

        $this->api->modifyTagAsync('TEST', $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteTagAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'DELETE',
            $this->url . 'tag',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteTagAsync('TEST')->wait();
    }

    public function testAssignTagAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->assignTagAsync($this->serverId, 'TEST');

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Server::class, $result->getServer());
        $this->assertContains('TEST', $result->getServer()->getTags()->getTag());
    }

    public function testThrowsExceptionOnAssignTagAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId. '/tag/TEST',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->assignTagAsync($this->serverId, 'TEST')->wait();
    }

    public function testUntagAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->untagAsync($this->serverId, 'DEV');

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Server::class, $result->getServer());
        $this->assertNotContains('DEV', $result->getServer()->getTags()->getTag());
    }

    public function testThrowsExceptionOnUntagAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId. '/untag/TEST',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->assignTagAsync($this->serverId, 'TEST')->wait();
    }
}
