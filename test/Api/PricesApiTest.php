<?php
/**
 * PricesApiTest
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
use \Upcloud\ApiClient\Upcloud\PricesApi;

/**
 * PricesApiTest Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class PricesApiTest extends \PHPUnit_Framework_TestCase
{

    public static $api;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {

        self::$api = new PricesApi;
        self::$api->getConfig()->setUsername(getenv("UPCLOUD_API_TEST_USER"));
        self::$api->getConfig()->setPassword(getenv("UPCLOUD_API_TEST_PASSWORLD"));
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
    }

    /**
     * Test case for listPrices
     *
     * List prices.
     *
     */
    public function testListPrices()
    {
        $priceList = self::$api->listPrices()["prices"]["zone"];
        $this->assertNotEquals(0, count($priceList));
        $priceZone = $priceList[0];
        $this->assertNotNull($priceZone["name"]);
        $this->assertNotNull($priceZone["firewall"]);
        $this->assertNotNull($priceZone["io_request_backup"]);
        $this->assertNotNull($priceZone["io_request_maxiops"]);
        $this->assertNotNull($priceZone["ipv4_address"]);
        $this->assertNotNull($priceZone["ipv6_address"]);
        $this->assertNotNull($priceZone["public_ipv4_bandwidth_in"]);
        $this->assertNotNull($priceZone["public_ipv4_bandwidth_out"]);
        $this->assertNotNull($priceZone["public_ipv6_bandwidth_in"]);
        $this->assertNotNull($priceZone["public_ipv6_bandwidth_out"]);
        $this->assertNotNull($priceZone["server_core"]);
        $this->assertNotNull($priceZone["server_memory"]);
        $this->assertNotNull($priceZone["server_plan_1x_cpu_1_gb"]);
        $this->assertNotNull($priceZone["server_plan_2x_cpu_2_gb"]);
        $this->assertNotNull($priceZone["storage_backup"]);
        $this->assertNotNull($priceZone["storage_maxiops"]);
    }
}
