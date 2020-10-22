<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Upcloud\PlanApi;

/**
 * PlanApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class PlanApiTest extends TestCase
{
    public static $api;

    /**
     * Setup before running any test cases.
     */
    public static function setUpBeforeClass(): void
    {
        self::$api = new PlanApi();
        self::$api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        self::$api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
    }

    /**
     * Test case for listPlans.
     *
     * List available plans.
     */
    public function testListPlans(): void
    {
        $planList = self::$api->listPlans()['plans']['plan'];
        $this->assertTrue(\count($planList) > 0);
    }
}
