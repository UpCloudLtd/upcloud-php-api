<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Upcloud\TimezoneApi;

/**
 * TimezoneApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class TimezoneApiTest extends TestCase
{
    /** Setup before running any test cases. */
    private $api;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->api = new TimezoneApi();
        $this->api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        $this->api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
    }

    /**
     * Test case for listTimezones.
     *
     * List timezones.
     */
    public function testListTimezones(): void
    {
        $timezones = $this->api->listTimezones()->getTimezones()->getTimezone();
        $zones = ['Africa', 'America', 'Antarctica', 'Arctic', 'Asia', 'Atlantic',
            'Australia', 'Europe', 'Indian', 'Pacific', 'UTC', ];
        $result = \array_reduce($timezones, static function ($acc, $timezone) use ($zones) {
            $zone = \explode('/', $timezone)[0];

            return $acc && \in_array($zone, $zones);
        }, true);
        $this->assertTrue($result);
    }
}
