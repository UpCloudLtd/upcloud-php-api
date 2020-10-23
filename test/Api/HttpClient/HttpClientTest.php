<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\HttpClient;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\HttpClient\UpcloudApiResponse;
use Upcloud\ApiClient\HttpClient\UpcloudHttpClient;

class HttpClientTest extends AbstractTestHttpClient
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
        $this->assertIsArray($response->toArray('\Upcloud\ApiClient\Model\AccountResponse'));
    }

    public function testThrowsExceptionOnClientError(): void
    {
        $this->expectException(ApiException::class);

        $request = new Request('GET', $this->url);

        $response = new Response(400, $this->fakeResponseHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->client->send($request);
    }
}
