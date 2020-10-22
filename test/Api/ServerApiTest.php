<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Model\CreateServerRequest;
use Upcloud\ApiClient\Upcloud\ServerApi;
use Upcloud\Tests\Helpers\ServerHelper;

/**
 * ServerApiTest Class Doc Comment.
 *
 * @category Class
 */
const defaultServer = [
    'zone' => 'fi-hel2',
    'title' => 'Firewall test server',
    'hostname' => 'debian.example.com',
    'password_delivery' => 'none',
    'plan' => '1xCPU-1GB',
    'storage_devices' => [
        'storage_device' => [
            [
                'action' => 'clone',
                'title' => 'Debian from a template',
                'size' => 30,
                'storage' => '01000000-0000-4000-8000-000020030100',
                'tier' => 'maxiops',
            ],
        ],
    ],
];
/**
 * @internal
 */
class ServerApiTest extends TestCase
{
    public static $api;

    /**
     * Setup before running any test cases.
     */
    public static function setUpBeforeClass(): void
    {
        self::$api = new ServerApi();
        self::$api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        self::$api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
    }

    /**
     * Clean up after running all test cases.
     */
    public static function tearDownAfterClass(): void
    {
        ServerHelper::removeAllServers();
    }

    /**
     * Test case for createServer.
     *
     * Create server.
     */
    public function testCreateServer(): void
    {
        $createdServer = self::$api->createServer(new CreateServerRequest(['server' => defaultServer]))['server'];
        $this->assertEquals($createdServer['title'], defaultServer['title']);
        $this->assertEquals($createdServer['zone'], defaultServer['zone']);
        $this->assertEquals($createdServer['hostname'], defaultServer['hostname']);
        $this->assertEquals($createdServer['plan'], defaultServer['plan']);
    }

    /**
     * Test case for listServers.
     *
     * List of servers.
     */
    public function testListServers(): void
    {
        $servers = self::$api->listServers()['servers']['server'];
        $prevSize = \count($servers);
        $createdServer = self::$api->createServer(new CreateServerRequest(['server' => defaultServer]))['server'];
        $servers = self::$api->listServers()['servers']['server'];
        $this->assertEquals($prevSize + 1, \count($servers));
    }
}
