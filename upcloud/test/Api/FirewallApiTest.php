<?php

/**
 * FirewallApiTest
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
use Upcloud\ApiClient\Upcloud\FirewallApi;
use \Upcloud\ApiClient\Helpers\ServerHelper;

/**
 * FirewallApiTest Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class FirewallApiTest extends \PHPUnit_Framework_TestCase
{

    public static $api;
    public static $server;
    public static $testRule;

    public const testFirewallRule = [
        // "position" => "500",
        "direction" => Model\FirewallRule::DIRECTION_IN,
        "family" => Model\AddressFamily::I_PV4,
        "protocol" => Model\FirewallRule::PROTOCOL_TCP,
        "source_address_start" => "192.168.1.1",
        "source_address_end" => "192.168.1.255",
        "source_port_start" => "1",
        "source_port_end" => "32000",
        "destination_port_start" => "22",
        "destination_port_end" => "22",
        "action" => Model\FirewallRule::ACTION_ACCEPT,
        "comment" => "Allow SSH from this network"
    ];
    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {
        FirewallApiTest::$api = new FirewallApi;
        // self::$api->getConfig()->setHost("http://localhost:8080/1.2");
        FirewallApiTest::$api->getConfig()->setUsername("toughbyte");
        FirewallApiTest::$api->getConfig()->setPassword("Topsekret5");
        self::$server = ServerHelper::createReadyServer();
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $serverId = self::$server["uuid"];
        $newRule = self::testFirewallRule;
        $newRule["comment"] = "Common firewall rule";
        $newRule["position"] = 500;
        $newRule["source_address_start"] = "193.168.1.1";
        $newRule["source_address_end"] = "193.168.1.255";
        self::$testRule = self::$api->createFirewallRule($serverId, new Model\FirewallRuleRequest([
        "firewall_rule" => $newRule
        ]))["firewall_rule"];
        // ServerHelper::removeAllServers();
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
        $serverId = self::$server["uuid"];
        self::$api->deleteFirewallRule($serverId, self::$testRule["position"]);
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
        ServerHelper::removeAllServers();
    }

    // public function testListFirewallRule()
    // {
    // }

    // /**
    //  * Test case for createFirewallRule
    //  *
    //  * Create firewall rule.
    //  *
    //  */
    public function testCreateFirewallRule()
    {
        $serverId = self::$server["uuid"];
        $createdRule = self::$api->createFirewallRule($serverId, new Model\FirewallRuleRequest([
        "firewall_rule" => self::testFirewallRule
        ]))["firewall_rule"];
        $this->assertEquals($createdRule["direction"], Model\FirewallRule::DIRECTION_IN);
        $this->assertEquals($createdRule["family"], Model\AddressFamily::I_PV4);
        $this->assertEquals($createdRule["icmp_type"], "");
        $this->assertEquals($createdRule["destination_address_start"], "");
        $this->assertEquals($createdRule["destination_address_end"], "");
        $this->assertEquals($createdRule["destination_port_start"], "22");
        $this->assertEquals($createdRule["destination_port_end"], "22");
        $this->assertEquals($createdRule["source_address_start"], "192.168.1.1");
        $this->assertEquals($createdRule["source_address_end"], "192.168.1.255");
        $this->assertEquals($createdRule["source_port_start"], "1");
        $this->assertEquals($createdRule["source_port_end"], "32000");


        self::$api->deleteFirewallRule($serverId, $createdRule["position"]);
    }

    // /**
    //  * Test case for deleteFirewallRule
    //  *
    //  * Remove firewall rule.
    //  *
    //  */
    public function testDeleteFirewallRule()
    {
        $serverId = self::$server["uuid"];
        $createdRule = self::$api->createFirewallRule($serverId, new Model\FirewallRuleRequest([
        "firewall_rule" => self::testFirewallRule
        ]))["firewall_rule"];
        $ruleForDelete = self::$api->getFirewallRule($serverId, $createdRule["position"])["firewall_rule"];
        $this->assertEquals($createdRule["position"], $ruleForDelete["position"]);
        self::$api->deleteFirewallRule($serverId, $ruleForDelete["position"]);
        $this->setExpectedException(ApiException::class);
        self::$api->getFirewallRule($serverId, $ruleForDelete["position"]);
    }


    // /**
    //  * Test case for serverServerIdFirewallRuleGet
    //  *
    //  * List firewall rules.
    //  *
    //  */
    public function testServerServerIdFirewallRuleGet()
    {
        $serverId = self::$server["uuid"];
        $firewallRules = self::$api->serverServerIdFirewallRuleGet($serverId)["firewall_rules"]["firewall_rule"];
        $hasRule = false;
        foreach ($firewallRules as $rule) {
            if ($rule["comment"] === "Common firewall rule") {
                $hasRule = true;
            }
        }
        $this->assertTrue($hasRule);
    }
}
