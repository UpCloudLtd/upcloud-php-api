<?php
/**
 * PlanApiTest
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
use \Upcloud\ApiClient\Upcloud\PlanApi;

/**
 * PlanApiTest Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class PlanApiTest extends \PHPUnit_Framework_TestCase
{

    public static $api;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {
        self::$api = new PlanApi;
        self::$api->getConfig()->setUsername("toughbyte");
        self::$api->getConfig()->setPassword("Topsekret5");
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
     * Test case for listPlans
     *
     * List available plans.
     *
     */
    public function testListPlans()
    {
        $planList = self::$api->listPlans()["plans"]["plan"];
        $this->assertTrue(count($planList) > 0);
    }
}
