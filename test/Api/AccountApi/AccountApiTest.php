<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\AccountApi;

use GuzzleHttp\Promise\PromiseInterface;
use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\FulfilledPromise;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\Account;
use Upcloud\ApiClient\Model\AccountResponse;
use Upcloud\ApiClient\Upcloud\AccountApi;
use Upcloud\Tests\Api\BaseApiTest;

/**
 * AccountApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class AccountApiTest extends BaseApiTest
{
    /**
     * @var AccountApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;


    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new AccountApi($this->mock);
    }

    public function testGetAccount()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($response);

        $account = $this->api->getAccount()->getAccount();
        $this->assertArrayHasKey('username', $account);
        $this->assertEquals($this->testUsername, $account->getUsername());
        $this->assertArrayHasKey('credits', $account);
        $this->assertEquals('42292.682', $account->getCredits());
    }


    public function testThrowsExceptionOnGetAccount(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $request = new Request('GET', $this->url . 'account', $this->fakeHeadersAsArray);
        $response = new Response(401, $this->fakeResponseHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->getAccount();
    }

    public function testGetAccountAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getAccountAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(AccountResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Account::class, $account = $result->getAccount());
        $this->assertArrayHasKey('username', $account);
        $this->assertEquals($this->testUsername, $account->getUsername());
        $this->assertArrayHasKey('credits', $account);
        $this->assertEquals('42292.682', $account->getCredits());
    }

    public function testThrowsExceptionOnGetAccountAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $request = new Request('GET', $this->url . 'account', $this->fakeHeadersAsArray);
        $response = new Response(401, $this->fakeResponseHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->getAccountAsync()->wait();
    }
}
