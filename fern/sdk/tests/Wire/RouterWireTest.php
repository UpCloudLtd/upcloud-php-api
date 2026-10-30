<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Router\Requests\ListRoutersRequest;
use Upcloud\Router\Requests\RouterCreate;
use Upcloud\Router\Types\RouterCreateRouter;
use Upcloud\Router\Types\RouterCreateRouterStaticRoutesItem;
use Upcloud\Router\Requests\RouterModify;
use Upcloud\Router\Types\RouterModifyRouter;
use Upcloud\Router\Types\RouterModifyRouterStaticRoutesItem;
use Upcloud\Types\RouterLabel;

class RouterWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListRouters(): void {
        $testId = 'router.list_routers.0';
        $this->client->router->listRouters(
            new ListRoutersRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'router.list_routers.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/router",
            null,
            1
        );
    }

    /**
     */
    public function testCreateRouter(): void {
        $testId = 'router.create_router.0';
        $this->client->router->createRouter(
            new RouterCreate([
                'router' => new RouterCreateRouter([
                    'name' => 'Example router',
                    'staticRoutes' => [
                        new RouterCreateRouterStaticRoutesItem([
                            'name' => 'static-route-0',
                            'nexthop' => '192.168.1.1',
                            'route' => '0.0.0.0/0',
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'router.create_router.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/router",
            null,
            1
        );
    }

    /**
     */
    public function testGetRouter(): void {
        $testId = 'router.get_router.0';
        $this->client->router->getRouter(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'router.get_router.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/router/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteRouter(): void {
        $testId = 'router.delete_router.0';
        $this->client->router->deleteRouter(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'router.delete_router.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/router/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testModifyRouter(): void {
        $testId = 'router.modify_router.0';
        $this->client->router->modifyRouter(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new RouterModify([
                'routerModifyRouter' => new RouterModifyRouter([
                    'name' => 'Example router',
                    'staticRoutes' => [
                        new RouterModifyRouterStaticRoutesItem([
                            'name' => 'static-route-0',
                            'nexthop' => '192.168.1.1',
                            'route' => '0.0.0.0/0',
                        ]),
                    ],
                    'labels' => [
                        new RouterLabel([
                            'key' => 'service',
                            'value' => 'postgres cluster connectivity',
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'router.modify_router.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/router/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    protected function setUp(): void {
        parent::setUp();
        $this->client = new UpcloudClient(
            token: 'test-token',
        options: [
            'baseUrl' => 'http://localhost:8080',
        ],
        );
    }
}
