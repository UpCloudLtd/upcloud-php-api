<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\AccountApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\Account;
use Upcloud\ApiClient\Model\AccountResourceLimits;
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
        if ($this->isNoCredentials) {
            $this->mock = Mockery::mock(Client::class);
            $this->api = new AccountApi($this->mock);
        } else {
            $this->api = new AccountApi();
            $this->api->getConfig()->setUsername($this->getUsername());
            $this->api->getConfig()->setPassword($this->getPassword());
        }
    }

    /**
     * @throws ApiException
     * @throws GuzzleException
     */
    public function testGetAccount()
    {

        if ($this->isNoCredentials) {
            $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

            $this->mock
                ->shouldReceive('send')
                ->once()
                ->andReturn($response);
        }

        $response = $this->api->getAccount();

        $this->assertInstanceOf(AccountResponse::class, $response);
        $this->assertInstanceOf(Account::class, $account = $response->getAccount());
        $this->assertEquals($this->getUsername(), $account->getUsername());

        $this->assertInstanceOf(AccountResourceLimits::class, $resourceLimits = $account->getResourceLimits());
        $this->assertNotNull($resourceLimits->getCores());
        $this->assertNotNull($resourceLimits->getMemory());
        $this->assertNotNull($resourceLimits->getNetworks());
        $this->assertNotNull($resourceLimits->getPublicIpv4());
        $this->assertNotNull($resourceLimits->getPublicIpv6());
        $this->assertNotNull($resourceLimits->getStorageHdd());
        $this->assertNotNull($resourceLimits->getStorageSsd());
    }


    /**
     * @throws ApiException
     * @throws GuzzleException
     */
    public function testThrowsExceptionOnGetAccount(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $this->api->getConfig()->setUsername($this->generateRandomString());
        $this->api->getConfig()->setPassword($this->generateRandomString());

        if ($this->isNoCredentials) {
            $request = new Request('GET', $this->url . 'account', $this->fakeHeadersAsArray);
            $response = new Response(401, $this->fakeResponseHeadersAsArray);

            $this->mock
                ->shouldReceive('send')
                ->once()
                ->andThrow(new RequestException('Bad Request', $request, $response));
        }

        $this->api->getAccount();
    }


    public function testGetAccountAsync()
    {
        if ($this->isNoCredentials) {
            $response = new Response(200, $this->fakeHeadersAsArray, $this->fakeRawBody);

            $this->mock
                ->shouldReceive('sendAsync')
                ->once()
                ->andReturn(new FulfilledPromise($response));
        }

        $promise = $this->api->getAccountAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(AccountResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Account::class, $account = $result->getAccount());
        $this->assertEquals($this->getUsername(), $account->getUsername());

        $this->assertInstanceOf(AccountResourceLimits::class, $resourceLimits = $account->getResourceLimits());
        $this->assertNotNull($resourceLimits->getCores());
        $this->assertNotNull($resourceLimits->getMemory());
        $this->assertNotNull($resourceLimits->getNetworks());
        $this->assertNotNull($resourceLimits->getPublicIpv4());
        $this->assertNotNull($resourceLimits->getPublicIpv6());
        $this->assertNotNull($resourceLimits->getStorageHdd());
        $this->assertNotNull($resourceLimits->getStorageSsd());
    }


    public function testThrowsExceptionOnGetAccountAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $this->api->getConfig()->setUsername($this->generateRandomString());
        $this->api->getConfig()->setPassword($this->generateRandomString());

        if ($this->isNoCredentials) {
            $request = new Request('GET', $this->url . 'account', $this->fakeHeadersAsArray);
            $response = new Response(401, $this->fakeResponseHeadersAsArray);

            $this->mock
                ->shouldReceive('sendAsync')
                ->once()
                ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));
        }
        $this->api->getAccountAsync()->wait();
    }
}
