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
use Upcloud\ApiClient\Model\Account;
use Upcloud\ApiClient\Model\AccountResponse;
use Upcloud\ApiClient\Serializer;
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
        if ($this->isNoCredentials) {
            $this->mock = Mockery::mock(Client::class);
            $this->client = new UpcloudHttpClient($this->mock);
        } else {
            $this->client = new UpcloudHttpClient();
            $this->client->getConfig()->setUsername($this->getUsername());
            $this->client->getConfig()->setPassword($this->getPassword());
        }
    }

    public function testCanSendNormalRequest(): void
    {
        $request = new Request('GET', $this->url . '/account');

        if ($this->isNoCredentials) {
            $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

            $this->mock
                ->shouldReceive('send')
                ->once()
                ->andReturn($response);
        }


        $response = $this->client->send($request);
        $this->assertInstanceOf(UpcloudApiResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());


        $this->assertIsArray(
            $responseArray = $response->setSerializer(new Serializer())->toArray(AccountResponse::class)
        );
        $this->assertInstanceOf(AccountResponse::class, $accountResponse = $responseArray[0]);
        $this->assertInstanceOf(Account::class, $account = $accountResponse->getAccount());
        $this->assertEquals($this->getUsername(), $account->getUsername());
    }

    public function testThrowsExceptionOnClientError(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $request = new Request('GET', $this->url . '/account');

        $this->client->getConfig()->setUsername($this->generateRandomString());
        $this->client->getConfig()->setPassword($this->generateRandomString());

        if ($this->isNoCredentials) {
            $response = new Response(401, $this->fakeResponseHeadersAsArray);

            $this->mock
                ->shouldReceive('send')
                ->once()
                ->andThrow(new RequestException('Bad Request', $request, $response));
        }

        $this->client->send($request);
    }

    public function testCanSendAsyncRequest(): void
    {
        $request = new Request('GET', $this->url . '/account');
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

        if ($this->isNoCredentials) {
            $this->mock
                ->shouldReceive('sendAsync')
                ->once()
                ->andReturn(new FulfilledPromise($response));
        }

        $promise = $this->client->sendAsync($request);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(UpcloudApiResponse::class, $result = $promise->wait());
        $this->assertIsArray(
            $responseArray = $result->setSerializer(new Serializer())->toArray(AccountResponse::class)
        );
        $this->assertInstanceOf(AccountResponse::class, $accountResponse = $responseArray[0]);
        $this->assertInstanceOf(Account::class, $account = $accountResponse->getAccount());
        $this->assertEquals($this->getUsername(), $account->getUsername());
    }

    public function testThrowsExceptionOnSendAsyncRequest(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $this->client->getConfig()->setUsername($this->generateRandomString());
        $this->client->getConfig()->setPassword($this->generateRandomString());

        $request = new Request('GET', $this->url . '/account');


        if ($this->isNoCredentials) {
            $response = new Response(401, $this->fakeHeadersAsArray, $this->fakeRawBody);
            $this->mock
                ->shouldReceive('sendAsync')
                ->once()
                ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));
        }

        $this->client->sendAsync($request)->wait();
    }
}
