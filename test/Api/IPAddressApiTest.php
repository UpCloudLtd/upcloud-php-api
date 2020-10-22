<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Model\AddIpRequest;
use Upcloud\ApiClient\Model\IpAddress;
use Upcloud\ApiClient\Model\ModifyIpRequest;
use Upcloud\ApiClient\Upcloud\IPAddressApi;
use Upcloud\Tests\Helpers\ServerHelper;

/**
 * IPAddressApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class IPAddressApiTest extends TestCase
{
    public static $api;

    public static $testIpAddress;
    public static $server;

    /**
     * Setup before running any test cases.
     */
    public static function setUpBeforeClass(): void
    {
        self::$api = new IPAddressApi();
        self::$api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        self::$api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
        self::$server = ServerHelper::createReadyServer();
        ServerHelper::stopServer(self::$server);
    }

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $serverId = self::$server['uuid'];
        $testIpAddress = ['family' => IpAddress::FAMILY_I_PV4, 'server' => $serverId];
        self::$testIpAddress = self::$api->addIp(new AddIpRequest(['ip_address' => $testIpAddress]))['ip_address'];
    }

    /**
     * Clean up after running each test case.
     */
    protected function tearDown(): void
    {
        if (self::$testIpAddress != null) {
            self::$api->deleteIp(self::$testIpAddress['address']);
        }
    }

    /**
     * Clean up after running all test cases.
     */
    public static function tearDownAfterClass(): void
    {
        ServerHelper::removeAllServers();
    }

    /**
     * Test case for addIp.
     *
     * Assign IP address.
     */
    public function testAddIp(): void
    {
        $serverId = self::$server['uuid'];
        $testIpAddress = ['family' => IpAddress::FAMILY_I_PV4, 'server' => $serverId];
        $ipAddress = self::$api->addIp(new AddIpRequest(['ip_address' => $testIpAddress]))['ip_address'];
        $this->assertEquals(IpAddress::ACCESS__PUBLIC, $ipAddress['access']);
        $this->assertEquals(IpAddress::FAMILY_I_PV4, $ipAddress['family']);
        $this->assertEquals($serverId, $ipAddress['server']);
        self::$api->deleteIp($ipAddress['address']);
    }

    /**
     * Test case for getDetails.
     *
     * Get IP address details.
     */
    public function testGetDetails(): void
    {
        $ip = self::$testIpAddress['address'];
        $ipAddress = self::$api->getDetails($ip)['ip_address'];

        $this->assertEquals(self::$testIpAddress['access'], $ipAddress['access']);
        $this->assertEquals(self::$testIpAddress['address'], $ipAddress['address']);
        $this->assertEquals(self::$testIpAddress['family'], $ipAddress['family']);
        $this->assertNotNull($ipAddress['ptr_record']);
        $this->assertNotNull($ipAddress['server']);
    }

    /**
     * Test case for listIps.
     *
     * List IP addresses.
     */
    public function testListIps(): void
    {
        $ipAddresses = self::$api->listIps()['ip_addresses']['ip_address'];
        $isIp = false;
        foreach ($ipAddresses as $ipAddress) {
            if ($ipAddress['address'] === self::$testIpAddress['address']) {
                $isIp = true;
            }
        }
        $this->assertTrue($isIp);
    }

    /**
     * Test case for modifyIp.
     *
     * Modify IP address.
     */
    public function testModifyIp(): void
    {
        $ip = self::$testIpAddress['address'];
        $ipAddress = ['ptr_record' => 'hostname.example.com'];
        $ipAddress = self::$api->modifyIp($ip, new ModifyIpRequest(['ip_address' => $ipAddress]))['ip_address'];
        $this->assertEquals('hostname.example.com', $ipAddress['ptr_record']);
        $this->assertEquals(self::$testIpAddress['access'], $ipAddress['access']);
        $this->assertEquals(self::$testIpAddress['family'], $ipAddress['family']);
        $this->assertEquals(self::$testIpAddress['server'], $ipAddress['server']);
    }
}
