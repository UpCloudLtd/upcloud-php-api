<?php
/**
 * TimezoneApiTest
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
use Upcloud\ApiClient\Upcloud\TimezoneApi;

/**
 * TimezoneApiTest Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class TimezoneApiTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Setup before running any test cases
     */
    private $api;
    
    public static function setUpBeforeClass()
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $this->api = new TimezoneApi;
        $this->api->getConfig()->setUsername("toughbyte");
        $this->api->getConfig()->setPassword("Topsekret5");
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
     * Test case for listTimezones
     *
     * List timezones.
     *
     */
    public function testListTimezones()
    {
        $timezones = $this->api->listTimezones()->getTimezones()->getTimezone();
        $zones = ["Africa", "America", "Antarctica", "Arctic", "Asia", "Atlantic", "Australia", "Europe", "Indian", "Pacific", "UTC"];
        $result = array_reduce($timezones, function ($acc, $timezone) use ($zones) {
            $zone = explode("/", $timezone)[0];
            return $acc && in_array($zone, $zones);
        }, true);
        $this->assertTrue($result);
    }
}
