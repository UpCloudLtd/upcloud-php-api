<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\ServerApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\ConfigurationListResponse;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\FirewallRule;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Model\FirewallRuleListResponse;
use Upcloud\ApiClient\Model\Server;
use Upcloud\ApiClient\Model\ServerListResponse;
use Upcloud\ApiClient\Upcloud\ServerApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\FirewallApiFixture;
use Upcloud\Tests\Api\Fixtures\ServerApiFixture;
use Upcloud\Tests\Api\Fixtures\StorageApiFixture;

/**
 * ServerApiAsyncTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class ServerApiAsyncTest extends BaseApiTest
{
    /**
     * @var ServerApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var ServerApiFixture
     */
    private $fixture;

    /**
     * @var StorageApiFixture
     */
    private $storageFixture;

    /**
     * @var FirewallApiFixture
     */
    private $firewallFixture;

    /**
     * Setup before running any test cases.
     */
    public function setUp(): void
    {

        $this->mock = Mockery::mock(Client::class);
        $this->api = new ServerApi($this->mock);
        $this->fixture = new ServerApiFixture;
        $this->storageFixture = new StorageApiFixture;
        $this->firewallFixture = new FirewallApiFixture;
    }

    public function testServerConfigurationsListAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseConfigBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('server_size', (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->listServerConfigurationsAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ConfigurationListResponse::class, $result = $promise->wait());

        $this->assertEquals($result, $this->fixture->getResponseConfig());
    }

    public function testListServersAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('server', (string) $request->getUri());
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->listServersAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(ServerListResponse::class, $result = $promise->wait());

        $list = $result->getServers()->getServer();
        $this->assertCount(3, $list);

        $fixtureList = $this->fixture->getResponse()->getServers()->getServer();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Server::class, $item);
            $this->assertEquals($item, $fixtureList[$key]);
        }
    }

    public function testGetServerDetailsAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'. $fakeRequest->getServer()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->serverDetailsAsync($fakeRequest->getServer()->getUuid());
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getServer(), $fakeRequest->getServer());
    }

    public function testCreateServerAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex(1));
        $fakeRequest = $this->fixture->getCreateRequest(1);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('server', (string) $request->getUri());
                $this->assertEquals($request->getBody()->getContents(), (string) $fakeRequest);
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createServerAsync($fakeRequest);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnCreateServerAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request('POST', $this->url . '/server', $this->fakeHeadersAsArray);

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createServerAsync($fakeRequest)->wait();
    }

    public function testStartServerAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$fakeRequest->getServer()->getUuid().'/start',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->startServerAsync($fakeRequest->getServer()->getUuid());
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());

        $this->assertEquals($result->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnStartServerAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $fakeRequest =  $this->fixture->getCreateRequest();
        $request = new Request(
            'POST',
            $this->url . '/server/'.$fakeRequest->getServer()->getUuid().'/start',
            $this->fakeHeadersAsArray
        );
        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->startServerAsync($fakeRequest->getServer()->getUuid())->wait();
    }

    public function testStopServerAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $stopRequest = $this->fixture->getStopRequest();
        $fakeRequest = $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/stop',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->stopServerAsync($this->serverId, $stopRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnStopServerAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request(
            'POST',
            $this->url . '/server/'.$this->serverId.'/stop',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getStopRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->stopServerAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testRestartServerAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $restartRequest = $this->fixture->getRestartRequest();
        $fakeRequest = $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/restart',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->restartServerAsync($this->serverId, $restartRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnRestartServerAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request(
            'POST',
            $this->url . '/server/'.$this->serverId.'/restart',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->fixture->getRestartRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->restartServerAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testModifyServerAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex(2));
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->modifyServerAsync($this->serverId, $fakeRequest);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertEquals($result->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnModifyServerAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request(
            'PUT',
            $this->url . '/server/'.$this->serverId,
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->modifyServerAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteServerAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request(
            'DELETE',
            $this->url . '/server/'.$this->serverId,
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteServerAsync($this->serverId)->wait();
    }

    public function testAssignTagAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/tag/TEST',
                    (string) $request->getUri()
                );
                return true;
            })
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
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/tag/TEST',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->assignTagAsync($this->serverId, 'TEST')->wait();
    }

    public function testAttachStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest =  $this->storageFixture->getAttachRequest();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/storage/attach',
                    (string) $request->getUri()
                );
                return true;
            })
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

        $fakeRequest =  $this->storageFixture->getAttachRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->attachStorageAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testDetachStorageAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest =  $this->storageFixture->getDetachRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/storage/detach',
                    (string) $request->getUri()
                );
                return true;
            })
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

        $fakeRequest =  $this->storageFixture->getDetachRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->detachStorageAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testLoadCdromAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest = $this->storageFixture->getLoadCdromRequest();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/cdrom/load',
                    (string) $request->getUri()
                );
                return true;
            })
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

        $fakeRequest =  $this->storageFixture->getLoadCdromRequest();

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

    public function testCreateFirewallRuleAsync(): void
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->firewallFixture->getRulesResponseBodyByIndex()
        );

        $fakeRequest = $this->firewallFixture->getRuleRequestSuccess();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/firewall_rule',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->createFirewallRuleAsync($this->serverId, $fakeRequest);
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(FirewallRuleCreateResponse::class, $result = $promise->wait());

        $this->assertEquals($result->getFirewallRule(), $fakeRequest->getFirewallRule());
    }

    public function testThrowsExceptionOnCreateFirewallRuleAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'POST',
            $this->url . 'server/'.$this->serverId.'/firewall_rule',
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest = $this->firewallFixture->getRuleRequestSuccess();

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->createFirewallRuleAsync($this->serverId, $fakeRequest)->wait();
    }

    public function testThrowsExceptionOnDeleteFirewallRuleAsync(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $request = new Request(
            'DELETE',
            $this->url . 'server/'.$this->serverId.'/firewall_rule/'. 1,
            $this->fakeHeadersAsArray
        );

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/firewall_rule/'. 1,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteFirewallRuleAsync($this->serverId, 1)->wait();
    }

    public function testGetFirewallRuleAsync()
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->firewallFixture->getRulesResponseBodyByIndex()
        );

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/firewall_rule/'. 1,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->getFirewallRuleAsync($this->serverId, 1);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(FirewallRuleCreateResponse::class, $result = $promise->wait());

        $fixtureRole = $this->firewallFixture->getRulesResponseByIndex();

        $this->assertEquals($result, $fixtureRole);
    }

    public function testServerServerIdFirewallRuleGetAsync()
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->firewallFixture->getRulesResponseBody()
        );

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/firewall_rule',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->serverServerIdFirewallRuleGetAsync($this->serverId);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(FirewallRuleListResponse::class, $result = $promise->wait());
        $rulesList = $result->getFirewallRules()->getFirewallRule();
        $this->assertCount(4, $rulesList);

        $fixtureRolesList = $this->firewallFixture->getRulesResponse()->getFirewallRules()->getFirewallRule();

        foreach ($rulesList as $key => $rule) {
            $this->assertInstanceOf(FirewallRule::class, $rule);
            $this->assertEquals($rule, $fixtureRolesList[$key]);
        }
    }

    public function testUntagAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/untag/DEV',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->untagAsync($this->serverId, 'DEV');
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(CreateServerResponse::class, $result = $promise->wait());
        $this->assertInstanceOf(Server::class, $result->getServer());
        $this->assertNotContains('DEV', $result->getServer()->getTags()->getTag());
    }
}
