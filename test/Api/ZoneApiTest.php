<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Upcloud\ZoneApi;

/**
 * ZoneApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class ZoneApiTest extends TestCase
{
    public $api;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->api = new ZoneApi();
        $this->api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        $this->api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
    }

    /**
     * Test case for listZones.
     *
     * List available zones.
     */
    public function testListZones(): void
    {
        $zoneList = $this->api->listZones()['zones']['zone'];
        $this->assertTrue(\count($zoneList) > 0);
    }
}
