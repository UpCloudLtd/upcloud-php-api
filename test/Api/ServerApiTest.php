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

use \Upcloud\ApiClient\Configuration;
use \Upcloud\ApiClient\ApiException;
use \Upcloud\ApiClient\ObjectSerializer;
use \Upcloud\ApiClient\Upcloud\ServerApi;
use \Upcloud\ApiClient\Helpers\ServerHelper;
use \Upcloud\ApiClient\Model\CreateServerRequest;

/**
 * ServerApiTest Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */

const defaultServer = [
    "zone" => "fi-hel1",
    "title" => "Firewall test server",
    "hostname" => "debian.example.com",
    "password_delivery" => "none"
    "plan" => "1xCPU-1GB",
    "storage_devices" => [
        "storage_device" => [
            [
                "action" => "clone",
                "title" => "Debian from a template",
                "size" => 50,
                "storage" => "01000000-0000-4000-8000-000020030100",
                "tier" => "maxiops"
            ]
        ]
    ]
];
class ServerApiTest extends \PHPUnit_Framework_TestCase
{

    public static $api;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {
        self::$api = new ServerApi;
        self::$api->getConfig()->setUsername(getenv("UPCLOUD_API_TEST_USER"));
        self::$api->getConfig()->setPassword(getenv("UPCLOUD_API_TEST_PASSWORD"));
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
        $createdServer = self::$api->createServer(new CreateServerRequest(["server" => defaultServer]))["server"];
        $this->assertEquals($createdServer["title"], defaultServer["title"]);
        $this->assertEquals($createdServer["zone"], defaultServer["zone"]);
        $this->assertEquals($createdServer["hostname"], defaultServer["hostname"]);
        $this->assertEquals($createdServer["plan"], defaultServer["plan"]);
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
        $createdServer = self::$api->createServer(new CreateServerRequest(["server" => defaultServer]))["server"];
        $servers = self::$api->listServers()["servers"]["server"];
        $this->assertEquals($prevSize + 1, count($servers));
    }
}
