<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\ServerApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\CreateServerResponse;
use Upcloud\ApiClient\Model\FirewallRule;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Model\Server;
use Upcloud\ApiClient\Upcloud\ServerApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\FirewallApiFixture;
use Upcloud\Tests\Api\Fixtures\ServerApiFixture;
use Upcloud\Tests\Api\Fixtures\StorageApiFixture;

/**
 * ServerApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class ServerApiTest extends BaseApiTest
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

    public function testServerConfigurationsList(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseConfigBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('server_size', (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->listServerConfigurations();

        $this->assertEquals($response, $this->fixture->getResponseConfig());
    }

    public function testListServers(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals('server', (string) $request->getUri());
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->listServers();

        $list = $response->getServers()->getServer();
        $this->assertCount(3, $list);

        $fixtureList = $this->fixture->getResponse()->getServers()->getServer();

        foreach ($list as $key => $item) {
            $this->assertInstanceOf(Server::class, $item);
            $fixtureItem = $fixtureList[$key];

            foreach ($item->getters() as $property => $getter) {
                $this->assertEquals($item->$getter(), $fixtureItem->$getter());
            }
        }
    }

    public function testGetServerDetails(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'. $fakeRequest->getServer()->getUuid(),
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->serverDetails($fakeRequest->getServer()->getUuid());
        $this->assertInstanceOf(CreateServerResponse::class, $response);
        $this->assertEquals($response->getServer(), $fakeRequest->getServer());
    }

    public function testCreateServer(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex(1));
        $fakeRequest = $this->fixture->getCreateRequest(1);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals('server', (string) $request->getUri());
                $this->assertEquals($request->getBody()->getContents(), (string) $fakeRequest);
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->createServer($fakeRequest);
        $this->assertEquals($response->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnCreateServer(): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);

        $request = new Request('POST', $this->url . '/server', $this->fakeHeadersAsArray);

        $response = new Response(400, $this->fakeHeadersAsArray);

        $fakeRequest =  $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createServer($fakeRequest);
    }

    public function testStartServer(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $fakeRequest = $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) use ($fakeRequest) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$fakeRequest->getServer()->getUuid().'/start',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->startServer($fakeRequest->getServer()->getUuid());

        $this->assertEquals($response->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnStartServer(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->startServer($fakeRequest->getServer()->getUuid());
    }

    public function testStopServer(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $stopRequest = $this->fixture->getStopRequest();
        $fakeRequest = $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/stop',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->stopServer($this->serverId, $stopRequest);

        $this->assertEquals($response->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnStopServer(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->stopServer($this->serverId, $fakeRequest);
    }

    public function testRestartServer(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $restartRequest = $this->fixture->getRestartRequest();
        $fakeRequest = $this->fixture->getCreateRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/restart',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->restartServer($this->serverId, $restartRequest);

        $this->assertEquals($response->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnRestartServer(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->restartServer($this->serverId, $fakeRequest);
    }

    public function testModifyServer(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex(2));
        $fakeRequest = $this->fixture->getModifyRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->modifyServer($this->serverId, $fakeRequest);


        $this->assertEquals($response->getServer(), $fakeRequest->getServer());
    }

    public function testThrowsExceptionOnModifyServer(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('PUT', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->modifyServer($this->serverId, $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteServer(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteServer($this->serverId);
    }

    public function testAssignTag(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/tag/TEST',
                    (string) $request->getUri()
                );
                return true;
            })
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
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/tag/TEST',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->assignTag($this->serverId, 'TEST');
    }

    public function testAttachStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest =  $this->storageFixture->getAttachRequest();

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/storage/attach',
                    (string) $request->getUri()
                );
                return true;
            })
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

        $fakeRequest =  $this->storageFixture->getAttachRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->attachStorage($this->serverId, $fakeRequest);
    }

    public function testDetachStorage(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest =  $this->storageFixture->getDetachRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/storage/detach',
                    (string) $request->getUri()
                );
                return true;
            })
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

        $fakeRequest =  $this->storageFixture->getDetachRequest();

        $response = new Response(400, $this->fakeHeadersAsArray);

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->detachStorage($this->serverId, $fakeRequest);
    }

    public function testLoadCdrom(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());

        $fakeRequest = $this->storageFixture->getLoadCdromRequest();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/cdrom/load',
                    (string) $request->getUri()
                );
                return true;
            })
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

        $fakeRequest =  $this->storageFixture->getLoadCdromRequest();

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

    public function testCreateFirewallRule(): void
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->firewallFixture->getRulesResponseBodyByIndex()
        );

        $fakeRequest = $this->firewallFixture->getRuleRequestSuccess();
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId. '/firewall_rule',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response = $this->api->createFirewallRule($this->serverId, $fakeRequest);

        $this->assertEquals($response->getFirewallRule(), $fakeRequest->getFirewallRule());
    }

    public function testThrowsExceptionOnCreateFirewallRule(): void
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
            ->shouldReceive('send')
            ->once()
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->createFirewallRule($this->serverId, $fakeRequest);
    }

    public function testThrowsExceptionOnDeleteFirewallRule(): void
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
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('DELETE', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/firewall_rule/'. 1,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteFirewallRule($this->serverId, 1);
    }

    public function testGetFirewallRule()
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->firewallFixture->getRulesResponseBodyByIndex()
        );

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/firewall_rule/'. 1,
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->getFirewallRule($this->serverId, 1);

        $this->assertInstanceOf(FirewallRuleCreateResponse::class, $response);

        $fixtureRole = $this->firewallFixture->getRulesResponseByIndex();

        $this->assertEquals($response, $fixtureRole);
    }

    public function testServerServerIdFirewallRuleGet()
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->firewallFixture->getRulesResponseBody()
        );

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('GET', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/firewall_rule',
                    (string) $request->getUri()
                );
                return true;
            })
            ->andReturn($fakeResponse);

        $response =  $this->api->serverServerIdFirewallRuleGet($this->serverId);

        $rolesList = $response->getFirewallRules()->getFirewallRule();
        $this->assertCount(4, $rolesList);

        $fixtureRolesList = $this->firewallFixture->getRulesResponse()->getFirewallRules()->getFirewallRule();

        foreach ($rolesList as $key => $role) {
            $this->assertInstanceOf(FirewallRule::class, $role);
            $fixtureRole = $fixtureRolesList[$key];

            foreach ($role->getters() as $property => $getter) {
                $this->assertEquals($role->$getter(), $fixtureRole->$getter());
            }
        }
    }

    public function testUntag(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBodyByIndex());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->withArgs(function (Request $request) {
                $this->assertEquals('POST', $request->getMethod());
                $this->assertEquals(
                    'server/'.$this->serverId.'/untag/DEV',
                    (string) $request->getUri()
                );
                return true;
            })
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
