<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\FirewallApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\FirewallRule;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Upcloud\FirewallApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\FirewallApiFixture;

/**
 * FirewallApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class FirewallApiTest extends BaseApiTest
{
    /**
     * @var FirewallApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var FirewallApiFixture
     */
    private $fixture;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new FirewallApi($this->mock);
        $this->fixture = new FirewallApiFixture;
    }

    public function testListFirewallRules()
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRulesResponseBody());

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response =  $this->api->serverServerIdFirewallRuleGet($this->serverId);

        $rolesList = $response->getFirewallRules()->getFirewallRule();
        $this->assertCount(4, $rolesList);

        $fixtureRolesList = $this->fixture->getRulesResponse()->getFirewallRules()->getFirewallRule();

        foreach ($rolesList as $key => $role) {
            $this->assertInstanceOf(FirewallRule::class, $role);
            $fixtureRole = $fixtureRolesList[$key];

            foreach ($role->getters() as $property => $getter) {
                $this->assertEquals($role->$getter(), $fixtureRole->$getter());
            }
        }
    }

    public function testGetFirewallRule()
    {
        $fakeResponse = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getRulesResponseBodyByIndex()
        );

        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response =  $this->api->getFirewallRule($this->serverId, 1);

        $this->assertInstanceOf(FirewallRuleCreateResponse::class, $response);

        $fixtureRole = $this->fixture->getRulesResponseByIndex();

        $this->assertEquals($response, $fixtureRole);
    }


    public function testCreateFirewallRule(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRulesResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRuleRequestSuccess();
        $this->mock
            ->shouldReceive('send')
            ->once()
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

        $fakeRequest = $this->fixture->getRuleRequestFailed();

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
            ->andThrow(new RequestException('Bad Request', $request, $response));

        $this->api->deleteFirewallRule($this->serverId, 1);
    }
}
