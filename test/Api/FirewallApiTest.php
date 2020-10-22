<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Model;
use Upcloud\ApiClient\Upcloud\FirewallApi;
use Upcloud\Tests\Helpers\ServerHelper;

/**
 * FirewallApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class FirewallApiTest extends TestCase
{
    public static $api;
    public static $server;
    public static $testRule;

    public static $testFirewallRule = [
        // "position" => "500",
        'direction' => Model\FirewallRule::DIRECTION_IN,
        'family' => Model\AddressFamily::I_PV4,
        'protocol' => Model\FirewallRule::PROTOCOL_TCP,
        'source_address_start' => '192.168.1.1',
        'source_address_end' => '192.168.1.255',
        'source_port_start' => '1',
        'source_port_end' => '32000',
        'destination_port_start' => '22',
        'destination_port_end' => '22',
        'action' => Model\FirewallRule::ACTION_ACCEPT,
        'comment' => 'Allow SSH from this network',
    ];

    /**
     * Setup before running any test cases.
     */
    public static function setUpBeforeClass(): void
    {
        FirewallApiTest::$api = new FirewallApi();
        // self::$api->getConfig()->setHost("http://localhost:8080/1.2");
        self::$api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        self::$api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
        self::$server = ServerHelper::createReadyServer();
    }

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $serverId = self::$server['uuid'];
        $newRule = self::$testFirewallRule;
        $newRule['comment'] = 'Common firewall rule';
        $newRule['position'] = 500;
        $newRule['source_address_start'] = '193.168.1.1';
        $newRule['source_address_end'] = '193.168.1.255';
        self::$testRule = self::$api->createFirewallRule($serverId, new Model\FirewallRuleRequest([
            'firewall_rule' => $newRule,
        ]))['firewall_rule'];
        // ServerHelper::removeAllServers();
    }

    /**
     * Clean up after running each test case.
     */
    protected function tearDown(): void
    {
        $serverId = self::$server['uuid'];
        self::$api->deleteFirewallRule($serverId, self::$testRule['position']);
    }

    /**
     * Clean up after running all test cases.
     */
    public static function tearDownAfterClass(): void
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
    public function testCreateFirewallRule(): void
    {
        $serverId = self::$server['uuid'];
        $createdRule = self::$api->createFirewallRule($serverId, new Model\FirewallRuleRequest([
            'firewall_rule' => self::$testFirewallRule,
        ]))['firewall_rule'];
        $this->assertEquals($createdRule['direction'], Model\FirewallRule::DIRECTION_IN);
        $this->assertEquals($createdRule['family'], Model\AddressFamily::I_PV4);
        $this->assertEquals($createdRule['icmp_type'], '');
        $this->assertEquals($createdRule['destination_address_start'], '');
        $this->assertEquals($createdRule['destination_address_end'], '');
        $this->assertEquals($createdRule['destination_port_start'], '22');
        $this->assertEquals($createdRule['destination_port_end'], '22');
        $this->assertEquals($createdRule['source_address_start'], '192.168.1.1');
        $this->assertEquals($createdRule['source_address_end'], '192.168.1.255');
        $this->assertEquals($createdRule['source_port_start'], '1');
        $this->assertEquals($createdRule['source_port_end'], '32000');

        self::$api->deleteFirewallRule($serverId, $createdRule['position']);
    }

    // /**
    //  * Test case for deleteFirewallRule
    //  *
    //  * Remove firewall rule.
    //  *
    //  */
    public function testDeleteFirewallRule(): void
    {
        $serverId = self::$server['uuid'];
        $createdRule = self::$api->createFirewallRule($serverId, new Model\FirewallRuleRequest([
            'firewall_rule' => self::$testFirewallRule,
        ]))['firewall_rule'];
        $ruleForDelete = self::$api->getFirewallRule($serverId, $createdRule['position'])['firewall_rule'];
        $this->assertEquals($createdRule['position'], $ruleForDelete['position']);
        self::$api->deleteFirewallRule($serverId, $ruleForDelete['position']);
        $this->expectException(ApiException::class);
        self::$api->getFirewallRule($serverId, $ruleForDelete['position']);
    }

    // /**
    //  * Test case for serverServerIdFirewallRuleGet
    //  *
    //  * List firewall rules.
    //  *
    //  */
    public function testServerServerIdFirewallRuleGet(): void
    {
        $serverId = self::$server['uuid'];
        $firewallRules = self::$api->serverServerIdFirewallRuleGet($serverId)['firewall_rules']['firewall_rule'];
        $hasRule = false;
        foreach ($firewallRules as $rule) {
            if ($rule['comment'] === 'Common firewall rule') {
                $hasRule = true;
            }
        }
        $this->assertTrue($hasRule);
    }
}
