<?php
/**
 * ServerApiTest
 * PHP version 5
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 *
 */


namespace Upcloud\ApiClient;

use Upcloud\ApiClient\Model\Server;
use Upcloud\ApiClient\Model\ServerLoginUser;
use Upcloud\ApiClient\Model\ServerStorageDevices;
use Upcloud\ApiClient\Model\SshKeys;
use Upcloud\ApiClient\Model\StorageDevice;
use \Upcloud\ApiClient\Upcloud\ServerApi;
use \Upcloud\ApiClient\Helpers\ServerHelper;
use \Upcloud\ApiClient\Model\CreateServerRequest;

/**
 * ServerApiTest Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class ServerApiTest extends \PHPUnit_Framework_TestCase
{

    public static $api;

    public static $defaultServer;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {
        self::$api = new ServerApi;
        self::$api->getConfig()->setUsername(getenv("UPCLOUD_API_TEST_USER"));
        self::$api->getConfig()->setPassword(getenv("UPCLOUD_API_TEST_PASSWORD"));
        self::$defaultServer = new Server([
            "zone" => "fi-hel2",
            "title" => "Firewall test server",
            "hostname" => "debian.example.com",
            "password_delivery" => "none",
            "plan" => "1xCPU-1GB",
            "login_user" => new ServerLoginUser([
                "create_password" => "no",
                "username" => "firewalltest",
                "ssh_keys" => new SshKeys([
                    "ssh_key" => [
                        "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDHf/oHh306iOGFBlQtiS7OQ7bUEhHlghAX8kRi2403BFCanFKp9yDVjk2RG+imBWt1KVHv7YfogToDqh/6U8B0C2o80VWe37O6wgTCN98jyVm36MC4O0/WSJMiHrNjbPENy6Cv6QXpwqo39qtz8MMyLOXi51sF1Z+t8mEhnol1JWGQzIpgujrLs7AW2Qfw5U7QKNCk16UIDXm8bYhKVX7Ehsn1YtBn5rRf6mzXQ+zHKYcEi8wNviwDlgwQ9nZp/ANpDzo/zCKmLQ4iraNr4v/aX7AXzfN/vsPP4YDkiT93vXNVaIqjzCAOeEsnLU0NvOufuwTNL2x70bDkx28XDytR firewalltest@example.com"
                    ]
                ]),
            ]),
            "storage_devices" => new ServerStorageDevices([
                "storage_device" => [new StorageDevice(
                    [
                        "action" => "create",
                        "title" => "Debian from scratch",
                        "size" => 20,
                        "tier" => "maxiops"
                    ]
                )]
            ])
        ]);
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
        ServerHelper::removeAllServers();
    }


    /**
     * Test case for createServer
     *
     * Create server.
     *
     */
    public function testCreateServer()
    {
        $createdServer = self::$api->createServer(new CreateServerRequest(["server" => self::$defaultServer]))["server"];
        $this->assertEquals($createdServer["title"], self::$defaultServer["title"]);
        $this->assertEquals($createdServer["zone"], self::$defaultServer["zone"]);
        $this->assertEquals($createdServer["hostname"], self::$defaultServer["hostname"]);
        $this->assertEquals($createdServer["plan"], self::$defaultServer["plan"]);
    }


    /**
     * Test case for listServers
     *
     * List of servers.
     *
     */
    public function testListServers()
    {
        $servers = self::$api->listServers()["servers"]["server"];
        $prevSize = count($servers);
        self::$api->createServer(new CreateServerRequest(["server" => self::$defaultServer]));
        $servers = self::$api->listServers()["servers"]["server"];
        $this->assertEquals($prevSize + 1, count($servers));
    }
}
