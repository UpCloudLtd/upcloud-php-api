<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\HttpClient;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\HttpClient\UpcloudHttpClient;
use Upcloud\Tests\Api\BaseApiTest;

class HttpClientTest extends BaseApiTest
{

    /**
     * @var UpcloudHttpClient
     */
    private $client;

    /**
     * @var Client
     */
    private $mock;


    public function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->client = new UpcloudHttpClient($this->mock);
    }

    public function testCanSendNormalRequest(): void
    {
        $request = new Request('GET', $this->url);
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($response);

        $response = $this->client->send($request);
        $this->assertInstanceOf(UpcloudApiResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($this->fakeRawBody, $response->getBody());
        $this->assertIsArray($responseArray = $response->toArray('\Upcloud\ApiClient\Model\AccountResponse'));
        $this->assertInstanceOf('\Upcloud\ApiClient\Model\Account', $responseArray[0]['account']);
    }

    public function testThrowsExceptionOnClientError(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request('GET', $this->url);

        $response = new Response(400, $this->fakeResponseHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->client->send($request);
    }

    public function testCanSendAsyncRequest(): void
    {
        $request = new Request('GET', $this->url);
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->client->sendAsync($request);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(UpcloudApiResponse::class, $result = $promise->wait());
        $this->assertEquals($this->fakeRawBody, $result->getBody());
        $this->assertIsArray($responseArray = $result->toArray('\Upcloud\ApiClient\Model\AccountResponse'));
        $this->assertInstanceOf('\Upcloud\ApiClient\Model\Account', $responseArray[0]['account']);
    }

    public function testThrowsExceptionOnSendAsyncRequest(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request('GET', $this->url);
        $response = new Response(400, $this->fakeHeadersAsArray, $this->fakeRawBody);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->client->sendAsync($request)->wait();
    }
}
