<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\PlanApi;

use Mockery;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Upcloud\ApiClient\Model\AvailablePlanListResponse;
use Upcloud\ApiClient\Upcloud\PlanApi;
use Upcloud\Tests\Api\BaseApiTest;
use Upcloud\Tests\Api\Fixtures\PlanApiFixture;

/**
 * PlanApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class PlanApiTest extends BaseApiTest
{

    /**
     * @var PlanApi
     */
    public $api;

    /**
     * @var Client
     */
    private $mock;

    /**
     * @var PlanApiFixture
     */
    private $fixture;

    /**
     * Setup before running any test cases.
     */
    public function setUp(): void
    {
        $this->mock = Mockery::mock(Client::class);
        $this->api = new PlanApi($this->mock);
        $this->fixture = new PlanApiFixture;
    }

    public function testListPlans(): void
    {
        $fakeResponse = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());
        $this->mock
            ->shouldReceive('send')
            ->once()
            ->andReturn($fakeResponse);

        $response = $this->api->listPlans();

        $this->assertInstanceOf(AvailablePlanListResponse::class, $response);
        $this->assertEquals($response, $this->fixture->getResponse());
    }

    public function testListPlansAsync(): void
    {
        $response = new Response(200, $this->fakeHeadersAsArray, $this->fixture->getResponseBody());

        $this->mock
            ->shouldReceive('sendAsync')
            ->once()
            ->andReturn(new FulfilledPromise($response));

        $promise = $this->api->listPlansAsync();

        $this->assertInstanceOf(PromiseInterface::class, $promise);
        $this->assertInstanceOf(AvailablePlanListResponse::class, $result = $promise->wait());
        $this->assertEquals($result, $this->fixture->getResponse());
    }
}
