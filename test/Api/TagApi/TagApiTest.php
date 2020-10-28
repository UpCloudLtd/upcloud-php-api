<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\TagApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
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
class TagApiTest extends BaseApiTest
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

    public function testListTags(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->listTags();

        $this->assertInstanceOf(TagListResponse::class, $response);
        $this->assertEquals($response, $this->fixture->getResponse());
    }

    public function testCreateTag(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->createTag($fakeRequest);

        $this->assertEquals($response, $this->fixture->getCreateResponse());
    }

    public function testThrowsExceptionOnCreateTag(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createTag($fakeRequest);
    }

    public function testModifyTag(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getModifyRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->modifyTag('TEST', $fakeRequest);

        $this->assertEquals($response, $this->fixture->getCreateResponse());
    }

    public function testThrowsExceptionOnModifyTag(): void
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

        $this->api->modifyTag('TEST', $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteTag(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteTag('TEST');
    }

    public function testAssignTag(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->assignTag($this->serverId, 'TEST');

        $this->assertInstanceOf(CreateServerResponse::class, $response);
        $this->assertInstanceOf(Server::class, $response->getServer());
        $this->assertContains('TEST', $response->getServer()->getTags()->getTag());
    }

    public function testThrowsExceptionOnAssignTag(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->assignTag($this->serverId, 'TEST');
    }

    public function testUntag(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getServerResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->untag($this->serverId, 'DEV');

        $this->assertInstanceOf(CreateServerResponse::class, $response);
        $this->assertInstanceOf(Server::class, $response->getServer());
        $this->assertNotContains('DEV', $response->getServer()->getTags()->getTag());
    }

    public function testThrowsExceptionOnUntag(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->assignTag($this->serverId, 'TEST');
    }
}
