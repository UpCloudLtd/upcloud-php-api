<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\FirewallApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\RequestException;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model\FirewallRule;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Model\FirewallRuleListResponse;
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
class FirewallApiAsyncTest extends BaseApiTest
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

    public function testListFirewallRulesAsync()
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRulesResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise =  $this->api->serverServerIdFirewallRuleGetAsync($this->serverId);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(FirewallRuleListResponse::class, $result = $promise->wait());



        $rulesList = $result->getFirewallRules()->getFirewallRule();
        $this->assertCount(4, $rulesList);

        $fixtureRolesList = $this->fixture->getRulesResponse()->getFirewallRules()->getFirewallRule();

        foreach ($rulesList as $key => $rule) {
            $this->assertInstanceOf(FirewallRule::class, $rule);
            $this->assertEquals($rule, $fixtureRolesList[$key]);
        }
    }

    public function testGetFirewallRuleAsync()
    {
        $response = new Response(
            200,
            $this->fakeHeadersAsArray,
            $this->fixture->getRulesResponseBodyByIndex()
        );

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->getFirewallRuleAsync($this->serverId, 1);

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(FirewallRuleCreateResponse::class, $result = $promise->wait());

        $fixtureRole = $this->fixture->getRulesResponseByIndex();

        $this->assertEquals($result, $fixtureRole);
    }


    public function testCreateFirewallRuleAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getRulesResponseBodyByIndex());
        $fakeRequest = $this->fixture->getRuleRequestSuccess();
        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
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

        $fakeRequest = $this->fixture->getRuleRequestFailed();

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
            ->andReturn(Promise\Create::rejectionFor(new RequestException('Bad Request', $request, $response)));

        $this->api->deleteFirewallRuleAsync($this->serverId, 1)->wait();
    }
}
