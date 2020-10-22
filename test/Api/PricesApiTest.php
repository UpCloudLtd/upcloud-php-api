<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Upcloud\PricesApi;

/**
 * PricesApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class PricesApiTest extends TestCase
{
    public static $api;

    /**
     * Setup before running any test cases.
     */
    public static function setUpBeforeClass(): void
    {
        self::$api = new PricesApi();
        self::$api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        self::$api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
    }

    /**
     * Test case for listPrices.
     *
     * List prices.
     */
    public function testListPrices(): void
    {
        $priceList = self::$api->listPrices()['prices']['zone'];
        $this->assertNotEquals(0, \count($priceList));
        $priceZone = $priceList[0];
        $this->assertNotNull($priceZone['name']);
        $this->assertNotNull($priceZone['firewall']);
        $this->assertNotNull($priceZone['io_request_backup']);
        $this->assertNotNull($priceZone['io_request_maxiops']);
        $this->assertNotNull($priceZone['ipv4_address']);
        $this->assertNotNull($priceZone['ipv6_address']);
        $this->assertNotNull($priceZone['public_ipv4_bandwidth_in']);
        $this->assertNotNull($priceZone['public_ipv4_bandwidth_out']);
        $this->assertNotNull($priceZone['public_ipv6_bandwidth_in']);
        $this->assertNotNull($priceZone['public_ipv6_bandwidth_out']);
        $this->assertNotNull($priceZone['server_core']);
        $this->assertNotNull($priceZone['server_memory']);
        $this->assertNotNull($priceZone['server_plan_1x_cpu_1_gb']);
        $this->assertNotNull($priceZone['storage_backup']);
        $this->assertNotNull($priceZone['storage_maxiops']);
    }
}
